<?php

namespace App\Http\Controllers;

use App\Enums\PackageStep;
use App\Enums\PackageType;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Services\PackageServices;
use Illuminate\Http\Request;


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
                $this->packageService->updateMedia($package, $request);
                break;

        }

        $nextStep = $this->packageService->changePackageStep($package, $step, $maxStep);

        return redirect()->route('package.edit', ['package' => $package->id, 'step' => $nextStep])->with('success', __('Job Post Updated Successfully. :)'));

    }



}
