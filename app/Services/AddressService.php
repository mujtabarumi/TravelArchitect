<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AddressService
{
    public $searchLimit;

    public function __construct()
    {
        $this->searchLimit = env('AJAX_SEARCH_LIMIT', 30);
    }

    public function searchCountry($keyword)
    {
        return Country::where('name','like',"%$keyword%")
            ->take($this->searchLimit)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function searchState($keyword, $countryId)
    {
        return State::where('country_id', $countryId)
            ->where('name','like',"%$keyword%")
            ->take($this->searchLimit)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function searchCity($keyword, $countryId=null, $stateId=null)
    {

//        if(blank($countryId) && blank($stateId)){
//            return collect();
//        }
//
        $query = City::query();
//        $query->join('states',function ($q) use ($countryId, $stateId){
//            $q->on('states.id','cities.state_id');
//            $q->when($countryId,function ($q) use ($countryId) {
//                $q->where('states.country_id',$countryId);
//            });
//
//            $q->when($stateId,function ($q) use ($stateId) {
//                $q->where('states.id',$stateId);
//            });
//        });


        return $query
            ->select('cities.*')
            ->where('cities.name','like',"%$keyword%")
            ->take($this->searchLimit)
            ->orderBy('cities.name', 'ASC')
            ->get();
    }

    public function create(array $data)
    {
        Address::create($data);
    }


    public function createOrUpdate(array $data, $id=0)
    {
        Address::updateOrCreate(['id' => $id],$data);
    }

    public function getAddressByModel($modeName, $modelId)
    {
        return Address::where('model_type', $modeName)->where('model_id', $modelId)
            ->with('country')
            ->with('state')
            ->with('country')
            ->first();
    }
}
