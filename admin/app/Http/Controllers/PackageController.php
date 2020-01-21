<?php

namespace App\Http\Controllers;

use App\Enums\PackageStep;
use App\Enums\PackageType;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Services\PackageServices;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class PackageController extends Controller
{
    const PACKAGE_CREATE_STEPS = [
        PackageStep::BASIC_INFORMATION => [
            "title" => "Information",
            "step" => "step-1",
            'disabled' => false
        ],
        PackageStep::DETAILS => [
            "title" => "Information",
            "step" => "step-2",
            'disabled' => false
        ],
        PackageStep::ITINERARIES => [
            "title" => "Itenerary",
            "step" => "step-3",
            'disabled' => false
        ],
        PackageStep::MEDIA => [
            "title" => "Media",
            "step" => "step-4",
            'disabled' => false
        ],
    ];
    private $packageService;

    public function __construct(PackageServices $packageService)
    {

        $this->packageService = $packageService;
        $this->lastStep = max(getEnumConstants(PackageStep::class));

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

//    public function packageCreate(PackageRequest $request)
    public function packageCreate(Request $request)
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

//        $applyTabs = config('job.post.apply.steps')[JobApplyStep::PERSONAL_INFORMATIONS]['tabs'];
//
//        $applyAllRules = config('job.apply.fields');
//
//        $applyRules = data_get($post, "meta.apply_rules", []);

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
}
