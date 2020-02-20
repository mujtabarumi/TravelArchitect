<?php

namespace App\Services;

use App\Enums\PackageStatus;
use App\Enums\PackageStep;
use App\Models\City;
use App\Models\Country;
use App\Models\Package;
use App\Models\PackageItinerary;
use App\Models\PackageItineraryInclude;
use App\Models\PackageType;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Spatie\MediaLibrary\Models\Media;

class PackageServices
{
    public $searchLimit;

    public function __construct()
    {
        $this->searchLimit = env('AJAX_SEARCH_LIMIT', 30);
    }

    public function searchPackageType($keyword)
    {
        return PackageType::where('name','like',"%$keyword%")
            ->take($this->searchLimit)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function removeSomekeyFromArray(&$data, $array)
    {
        foreach ($array as $key) {
            array_forget($data, $key);
        }
    }

    public function parseCarbonData(&$data,$map)
    {
        foreach ($map as $key => $format) {
            if ($data[$key]) {
                $data[$key] = Carbon::parse($data[$key])->format($format);
            }
        }
    }

    public function addFileMediaToCollection($model, $collectionName, $file, $order = null)
    {
        $media = $model->addMedia($file)->toMediaCollection($collectionName);

        if (!blank($order) && ($media instanceof Media)) {
            $media->update([
                'order_column' => $order
            ]);
        }
    }




}
