<?php

namespace App\Http\Controllers;

use App\Enums\PackageStep;
use App\Enums\PackageType;
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
    private

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
//        return $tabs;
        return view('package.create', compact('tabs','packageData', 'currentStep','tabData'));
    }
}
