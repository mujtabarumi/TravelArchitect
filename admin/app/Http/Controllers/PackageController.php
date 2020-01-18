<?php

namespace App\Http\Controllers;

use App\Enums\PackageStep;
use App\Enums\PackageType;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    const PACKAGE_CREATE_STEPS = [
        PackageStep::BASIC_INFORMATION => [
            "title" => "Information",
            "step" => "step-1",
            'disabled' => false
        ],
        PackageStep::ITINERARIES => [
            "title" => "Itenerary",
            "step" => "step-2",
            'disabled' => false
        ],
        PackageStep::MEDIA => [
            "title" => "Media",
            "step" => "step-3",
            'disabled' => false
        ],
    ];

    const PackageType = [
        PackageType::HOLIDAY => 'Holiday',
        PackageType::TOUR => 'Tour',
    ];

    public function getPackageCreateFrom()
    {
        $currentStep = PackageStep::BASIC_INFORMATION;
        $packageData = [];
        $tabData = data_get($packageData, $currentStep, []);
        return view('package.create', compact('packageData', 'currentStep','tabData'));
    }
}
