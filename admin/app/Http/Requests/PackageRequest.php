<?php

namespace App\Http\Requests;

use App\Enums\PackageStep;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $packageRule = [
        PackageStep::BASIC_INFORMATION => [
            'package_type' => 'required',
            'package_theme' => 'required',
            'recommended' => 'boolean|nullable',
            'popular' => 'boolean|nullable',
            'is_everyday_departs' => 'boolean|nullable',
            'air_price_included' => 'boolean|nullable',
            'title' => 'string|max:255|required',
            'budget' => 'numeric|required',
            'address.country' => 'nullable|numeric',
            'address.state'   => 'nullable',
            'address.city' => 'required|numeric',
            'valid_from' => 'date|required',
            'valid_till' => 'date|required',
            'departure_date' => 'date|nullable',
        ],
        PackageStep::DETAILS => [

        ],
        PackageStep::ITINERARIES => [

        ],
        PackageStep::MEDIA => [

        ]
    ];

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'step' => 'required|numeric'
        ];

        if  (isValidPackageStep(PackageStep::class,$this->get('step'))) {
            $rules = array_merge($rules,data_get($this->packageRule,$this->get('step')),[]);
        }

        return $rules;
    }

    public function messages()
    {
        return [

        ];
    }
}
