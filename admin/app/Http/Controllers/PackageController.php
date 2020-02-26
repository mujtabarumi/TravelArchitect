<?php

namespace App\Http\Controllers;

use App\Enums\PackageStatus;
use App\Enums\PackageStep;
use App\Enums\PackageType;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Services\PackageServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;


class PackageController extends Controller
{
    const PACKAGE_CREATE_STEPS = [
        PackageStep::BASIC_INFORMATION => [
            "title" => "Information",
            "step" => "step-1",
            'disabled' => false
        ],
        PackageStep::DETAILS => [
            "title" => "Details",
            "step" => "step-2",
            'disabled' => false
        ],
        PackageStep::ITINERARIES => [
            "title" => "Itinerary",
            "step" => "step-3",
            'disabled' => false
        ],
        PackageStep::MEDIA => [
            "title" => "Media",
            "step" => "step-4",
            'disabled' => false
        ],
        PackageStep::ADDITIONAL => [
            "title" => "Additional",
            "step" => "step-5",
            'disabled' => false
        ],
    ];
    private $packageService;

    public function __construct(PackageServices $packageService)
    {

        $this->packageService = $packageService;
       // $this->lastStep = max(getEnumConstants(PackageStep::class));

    }

    const PackageType = [
        PackageType::HOLIDAY => 'Holiday',
        PackageType::TOUR => 'Tour',
    ];

    public function getPackageCreateFrom()
    {
        $currentStep = PackageStep::BASIC_INFORMATION;
        $packageSteps = Self::PACKAGE_CREATE_STEPS;
        $packageData = [];
        $tabs = getActiveInactivePackageStep($packageSteps,$currentStep,$packageData);
        $tabData = data_get($tabs, $currentStep, []);

        return view('package.create', compact('tabs','packageData', 'currentStep','tabData'));
    }

    public function packageCreate(PackageRequest $request)
    {
        $package = null;

        \DB::transaction(function() use ($request, &$package) {
            $package = $this->packageService->savePackagePost($request->all(), auth()->user());
        });


        return redirect()->to(route('package.edit', ['package' => $package->id, 'step' => 2]))->with('success', __('Package created successfully. :) '));
    }

    public function getPackageEditFrom(Package $package, Request $request) {

        $packageSteps = Self::PACKAGE_CREATE_STEPS;
        $stepKeys = array_keys($packageSteps);

        $maxStep = max($stepKeys);
        $nextStep = $package->steps + 1;
        $currentStep = $request->get('step', ($package->steps < $maxStep) ? $nextStep : PackageStep::BASIC_INFORMATION);

        if (!isset($packageSteps[$currentStep])) {
            $currentStep += 1;
        }

        if (!isValidPackageStep(PackageStep::class, $currentStep)) {
            $currentStep = PackageStep::BASIC_INFORMATION;
        }

        $packageData = $this->packageService->breakPackageIntoSteps($package, $currentStep);

        $tabs = $packageSteps;

        foreach ($tabs as $key => $tab) {
            if (($package->steps < 3 && $key > ($package->steps + 1))) {
                $tabs[$key]['disabled'] = true;
            }
        }

        $tabData = data_get($packageData, $currentStep, []);

        return view('package.edit', compact('packageData', 'currentStep', 'tabs', 'tabData', 'package'));

    }

    public function updatePackagePost(PackageRequest $request, Package $package) {

        $packageSteps = Self::PACKAGE_CREATE_STEPS;
        $maxStep = max(array_keys($packageSteps));
        $step = $request->get('step', PackageStep::BASIC_INFORMATION);

        switch ($step) {
            case PackageStep::BASIC_INFORMATION:
                $this->packageService->updateBasicInformation($package, $request);
                break;

            case PackageStep::DETAILS:
                $this->packageService->updateDescription($package, $request);
                break;

            case PackageStep::ITINERARIES:
                $this->packageService->updateItineraries($package, $request);
                break;
            case PackageStep::MEDIA:
                $this->packageService->updateMediaRelatedInfo($package, $request);
                break;
            case PackageStep::ADDITIONAL:
                $this->packageService->updateAdditionalInfo($package, $request);
                break;

        }

        $nextStep = $this->packageService->changePackageStep($package, $step, $maxStep);
        $status = $request->get('status');
        $tabRoutes = config('packages.tabRoutes', []);

        switch ($status) {
            case PackageStatus::PUBLISHED:

                if (Carbon::now()->gte($package->valid_till)) {
                    return redirect()->back()->with('error', __("Expire date should be bigger then today"));
                }

                $package->update([
                    'status' => PackageStatus::PUBLISHED
                ]);

                return redirect()->route('package.listing', [$tabRoutes[PackageStatus::PUBLISHED]])->with('success', __('Package Published successfully'));

            case PackageStatus::ARCHIVED:

                $package->update([
                    'status' => PackageStatus::ARCHIVED
                ]);

                return redirect()->route('package.listing', [$tabRoutes[PackageStatus::ARCHIVED]])
                    ->with('success', __('Package Archived successfully'));

            case PackageStatus::REPUBLISHED:

                if (Carbon::now()->gte($package->valid_till)) {
                    return redirect()->back()->with('error', __("Expire date should be bigger then today"));
                }

                $package->update([
                    'status' => PackageStatus::PUBLISHED
                ]);
                return redirect()->route('package.listing', [$tabRoutes[PackageStatus::PUBLISHED]])
                    ->with('success', __('Package Republished successfully'));
        }

        return redirect()->route('package.edit', ['package' => $package->id, 'step' => $nextStep])
            ->with('success', __('Package Updated Successfully. :)'));

    }

    public function packageListing(Request $request, $param)
    {
        $tabRoutes = config('packages.tabRoutes');

        if ($status = $this->isValidTabRoute($tabRoutes, $param)) {

            $search = $request->get('search');

            $query = Package::with(['itineraries',]);
//                ->withCount(['applicants' => function($q)
//                    {
//                        $q->where('status', PackageStatus::COMPLETE);
//                    }])
//                ->where('company_id', session()->get('company_id'));


            if (!blank($status)) {
                $query->where('status', $status);
            }

            if (!blank($search)) {
                $query->where('title', 'like', "%$search%");
            }

            $packages = $query->latest()->paginate(12)->appends($request->all());

            return view('package.listing', compact('packages', 'status', 'search', 'tabRoutes', 'param'));
        }
        else {
            return redirect()->back();
        }
    }

    private function isValidTabRoute($tabRoutes, $param)
    {
        return (array_search($param, $tabRoutes));
    }

    public function duplicatePackage(Request $request, Package $package)
    {
        $newPackage = null;
        \DB::transaction(function() use ($package, &$newPackage) {
            $newPackage = $this->packageService->duplicatePackage($package, auth()->user());
        });

        $draft = config('packages.tabRoutes')[PackageStatus::DRAFT];

        return redirect()->to(route('package.listing', [$draft]))
            ->with('success', __('Package duplicated successfully and saved as draft. :)'));
    }

    public function deletePackage(Package $package, Request $request)
    {
        $package->delete();
        return redirect()->back()->with('success', __('Package deleted successfully. :) '));
    }

    public function savePackageImage(Request $request)
    {
        $this->validate($request, [
            'target' => 'required',
            'file' => ['required','image'],
            'package_id' => 'required|numeric'
        ]);

        if ($request->hasFile('file')) {
            $request->request->add([ $request->get('target') => $request->file('file')]);
            $request->offsetUnset('file');
            $request->offsetUnset('target');

            $package = Package::findOrFail($request->get('package_id'));

            $service = $this->packageService->savePackageImages($request, $package);


        }

        return response()->json([
            'success' => $request->get('target')
        ], 200);
    }




}
