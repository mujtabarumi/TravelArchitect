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
use Illuminate\Http\Request;
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

    public function savePackagePost($packageData, $user) {

        $data = Arr::only($packageData,['title','package_type','valid_from','valid_till','duration',
        'is_everyday_departs','departure_date','air_price_included','budget']);

//        $address = $this->serializeAddressData(data_get($data,'address'));
//        $this->removeSomekeyFromArray($data,['address']);
        $this->parseCarbonData($data, [
            'valid_from' => "Y-m-d",
            'valid_till' => "Y-m-d",
            'departure_date' => "Y-m-d",
        ]);
//        $data['city_id'] = data_get($packageData,'address.city');
        $data['theme_map'] = json_encode(data_get($packageData,'package_theme'));
        $data['package_type_id'] = $packageData['package_type'];
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;

        $meta = $packageData['meta'];

        $country = data_get($meta,'address.country',[]);
        $city = data_get($meta,'address.city',[]);

        $meta['address']['country'] = $country;
        $meta['address']['city'] = $city;

        $data['meta'] = $meta;

        $package = Package::create($data);
//        $package->address()->create($address);


        return $package;
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

    public function breakPackageIntoSteps($package,$step = null)
    {
        $BASIC_INFORMATION = [];
        $DETAILS = [];
        $ITINERARIES = [];
        $MEDIA = [];
        $ADDITIONAL = [];

        if (blank($step) || $step == PackageStep::BASIC_INFORMATION) {
            $BASIC_INFORMATION = $package->only(['title','package_type_id','theme_map','valid_from','valid_till','recommended','address','meta',
                'duration','popular','is_everyday_departs','departure_date','air_price_included','budget']);
            $BASIC_INFORMATION['valid_from'] = $package->valid_from->format('Y/m/d');
            $BASIC_INFORMATION['valid_till'] = $package->valid_till->format('Y/m/d');
            if (!blank($package->departure_date)) {
                $BASIC_INFORMATION['departure_date'] = $package->departure_date->format('Y/m/d');
            } else {
                $BASIC_INFORMATION['departure_date'] = null;
            }


        }

        if (blank($step) || $step == PackageStep::DETAILS) {
            $DETAILS = $package->only(['details','inclusion','exclusion','meta']);
        }
        if (blank($step) || $step == PackageStep::ITINERARIES) {
            $ITINERARIES['itineraries'] = $package->itineraries->pluck('id')->all();
        }
        if (blank($step) || $step == PackageStep::MEDIA) {
            $MEDIA = $package->only(['recommended']);
        }
        if (blank($step) || $step == PackageStep::ADDITIONAL) {
            $ADDITIONAL = $package->only(['additional_info','terms_and_conditions']);
        }

        return [
            PackageStep::BASIC_INFORMATION => $BASIC_INFORMATION,
            PackageStep::DETAILS => $DETAILS,
            PackageStep::ITINERARIES => $ITINERARIES,
            PackageStep::MEDIA => $MEDIA,
            PackageStep::ADDITIONAL => $ADDITIONAL,
        ];
    }

    public function serializeAddressData($addressData){
        return [
            'country_id' => data_get($addressData, 'country'),
            'state_id' => data_get($addressData, 'state'),
            'city_id' => data_get($addressData, 'city')
        ];
    }

    public function updateBasicInformation(Package $package, $request)
    {
        $request = $request->all();

        $data = Arr::only($request,['title','package_type','valid_from','valid_till','duration','meta',
           'is_everyday_departs','departure_date','air_price_included','budget']);

        $data['valid_from'] = Carbon::parse($data['valid_from'])->format('Y-m-d');
        $data['valid_till'] = Carbon::parse($data['valid_till'])->format('Y-m-d');
        $data['departure_date'] = Carbon::parse($data['departure_date'])->format('Y-m-d');

        $data['updated_by'] = auth()->user('id');

//        $data['city_id'] = data_get($request,'address.city');
        $data['theme_map'] = json_encode(data_get($request,'package_theme'));
        $data['package_type_id'] = data_get($request,'package_type');

//        $addressData = [
//            'country_id' => data_get($request,'address.country'),
//            'state_id'  => data_get($request,'address.state'),
//            'city_id' => data_get($request,'address.city'),
//        ];
//
//
//        $package->address->update($addressData);

        $meta = $package->meta;

        $country = data_get($data,'meta.address.country',[]);
        $city = data_get($data,'meta.address.city',[]);

        $meta['address']['country'] = $country;
        $meta['address']['city'] = $city;

        $package->meta = $meta;


        return $package->update($data);
    }

    public function updateDescription(Package $package, $request)
    {

        $meta = $package->meta;

        $meta['package_cost'] = data_get($request,'meta.package_cost',[]);
        $meta['places'] = data_get($request,'meta.places',[]);

        $package->fill($request->only(['details']));
        $package->inclusion = json_encode(data_get($request,'inclusion'));
        $package->exclusion = json_encode(data_get($request,'exclusion'));
        $package->meta = $meta;
        $package->save();

        return $package;
    }
    public function updateItineraries(Package $package, $request)
    {

       // dd($request->all());
        $oldItineraryIds = $package->itineraries->pluck('id')->toArray();

//        PackageItineraryInclude::whereIn('package_itinerary_id',$package->itineraries->pluck('id')->all())->delete();
//        PackageItinerary::where('package_id',$package->id)->delete();
//
        $count = 0;
        foreach ($request->get('itinerary') as $iti) {
            $dataItinerary = [
                'title' => $iti['title'],
                'details' => $iti['details'],
                'package_id' => $package->id
            ];
            if (array_key_exists($count,$oldItineraryIds)) {
              //  dd(1);
                $it = PackageItinerary::updateOrCreate(['id' => $oldItineraryIds[$count]],$dataItinerary);
            } else {
               // dd(2);
                $it = PackageItinerary::create($dataItinerary);
            }

            if (array_key_exists('includes', $iti)) {
                $itiIncIds = $it->itineraryIncludes()->pluck('id')->toArray();
               // dd($itiIncIds);

                $incCount = 0;
                foreach ($iti['includes'] as $inc) {
                    $dataIncludes = [
                        'text' => $inc,
                        'package_itinerary_id' => $it->id
                    ];

                    if (array_key_exists($incCount,$itiIncIds)) {
                        //  dd(1);
                        PackageItineraryInclude::updateOrCreate(['id' => $itiIncIds[$incCount]],$dataIncludes);
                    } else {
                        // dd(2);
                        PackageItineraryInclude::create($dataIncludes);
                    }
//
//                    PackageItineraryInclude::create($dataIncludes);
                    $incCount++;
                }

            }
            $count++;
        }

        return $package;
    }

    public function updateMediaRelatedInfo (Package $package, $request) {

        $request = $request->all();

        $data = Arr::only($request,['recommended','home_slider']);

        return $package->update($data);


    }

    public function updateAdditionalInfo (Package $package, $request) {

        $request = $request->all();

        $data = Arr::only($request,['additional_info','terms_and_conditions']);

        return $package->update($data);


    }

//    public function updateMedia(Package $package, $request) {
//
//        if($request->hasFile('cover_photo')){
//
//            $this->addFileMediaToCollection($package, 'cover_photo', $request->file('cover_photo'));
//           // $package->addMediaFromRequest('cover_photo')->toMediaCollection('cover_photo');
//        }
//
//        $slider = $package->getMedia('slider_images');
//
//        if($request->hasFile('showcase_case_1')){
//            $image1 = $slider->where('order_column', 1)->first();
//
//            if (!blank($image1)) {
//                $image1->delete();
//            }
//
//            $showcase_photo_1 = $request->file('showcase_case_1');
//            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_1, 1);
////            $package->addMediaFromRequest('slider_images')->toMediaCollection('slider_images');
//        }
//
//
//        if($request->hasFile('showcase_case_2')){
//
//            $image2 = $slider->where('order_column', 2)->first();
//
//            if (!blank($image2)) {
//                $image2->delete();
//            }
//
//            $showcase_photo_2 = $request->file('showcase_case_2');
//            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_2, 2);
//            //$package->addMediaFromRequest('slider_images')->toMediaCollection('slider_images');
//        }
//
//        if($request->hasFile('showcase_case_3')){
//            $image3 = $slider->where('order_column', 3)->first();
//
//            if (!blank($image3)) {
//                $image3->delete();
//            }
//
//            $showcase_photo_3 = $request->file('showcase_case_3');
//            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_3, 3);
//        }
//
//        if($request->hasFile('showcase_case_4')){
//            $image4 = $slider->where('order_column', 4)->first();
//
//            if (!blank($image4)) {
//                $image4->delete();
//            }
//
//            $showcase_photo_4 = $request->file('showcase_case_4');
//            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_4, 4);
//        }
//
//
//    }

    public function savePackageImages(Request $request, Package $package) {

        if($request->get('cover_photo')){

            $this->addFileMediaToCollection($package, 'cover_photo', $request->get('cover_photo'));
        }
        if($request->get('package_recomanded_images')){

            $this->addFileMediaToCollection($package, 'recomanded_images', $request->get('package_recomanded_images'));
        }
        if($request->get('package_list_images')){

            $this->addFileMediaToCollection($package, 'list_images', $request->get('package_list_images'));
        }

        $slider = $package->getMedia('slider_images');

        if($request->get('package_showcase_case_1')){
            $image1 = $slider->where('order_column', 1)->first();

            if (!blank($image1)) {
                $image1->delete();
            }

            $showcase_photo_1 = $request->get('package_showcase_case_1');
            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_1, 1);

        }


        if($request->get('package_showcase_case_2')){

            $image2 = $slider->where('order_column', 2)->first();

            if (!blank($image2)) {
                $image2->delete();
            }

            $showcase_photo_2 = $request->get('package_showcase_case_2');
            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_2, 2);

        }

        if($request->get('package_showcase_case_3')){
            $image3 = $slider->where('order_column', 3)->first();

            if (!blank($image3)) {
                $image3->delete();
            }

            $showcase_photo_3 = $request->get('package_showcase_case_3');
            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_3, 3);
        }

        if($request->get('package_showcase_case_4')){
            $image4 = $slider->where('order_column', 4)->first();

            if (!blank($image4)) {
                $image4->delete();
            }

            $showcase_photo_4 = $request->get('package_showcase_case_4');
            $this->addFileMediaToCollection($package, 'slider_images', $showcase_photo_4, 4);
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

    public function changePackageStep($package, $currentStep, $maxStep)
    {
        $nextStep = $currentStep;

        if ($nextStep > $package->steps && $nextStep <= $maxStep) {
            $package->steps = $currentStep;
            $package->save();
        }

        if ($nextStep < $maxStep ) {
            $nextStep = $currentStep + 1;
        }

        return $nextStep;
    }

    public function duplicatePackage($packageData, $user)
    {
        $data = $packageData->toArray();
        $data['status'] = PackageStatus::DRAFT;

        $this->removeSomekeyFromArray($data, ['id','created_at', 'updated_at', 'deleted_at']);

        // Package Save
        $package = Package::create($data);

        // Address Save
        if ($packageData->address()->count()) {
            $address = $packageData->address->toArray();
            $this->removeSomekeyFromArray($address, ['id', 'country', 'state', 'city']);
            $package->address()->create($address);
        }

        // itineraries Mapping
        if ($packageData->itineraries()->count()) {
            $itineraries = $packageData->itineraries()->pluck('id')->toArray();

            foreach ($itineraries as $iti) {

               $newIti = PackageItinerary::find($iti);

                $dataItinerary = [
                    'title' => $newIti['title'],
                    'details' => $newIti['details'],
                    'package_id' => $package->id
                ];

                $it = PackageItinerary::create($dataItinerary);

                $newItiInc = $newIti->itineraryIncludes()->pluck('id')->toArray();

                foreach ($newItiInc as $inc) {

                    $inc = PackageItineraryInclude::find($inc);

                    $dataIncludes = [
                        'text' => $inc,
                        'package_itinerary_id' => $it->id
                    ];
                    PackageItineraryInclude::create($dataIncludes);
                }

            }

        }

        return $package;
    }
}
