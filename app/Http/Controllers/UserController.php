<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index(){

       $user =  User::where('id', Auth::id())->first();

        return view('user.profile', compact('user'));
    }
    public function updateprofile(Request $data){
        $user = User::findOrFail(Auth::id());

        $user->name = $data->name;
        $user->email = $data->email;
        $user->mobile_number = $data->mobile_number;
        $user->country_id = $data->country_id;
        $user->passport_number = $data->passport_number;
        $user->passport_expiry_date = $data->passport_expiry_date;
        $user->national_id_number = $data->national_id_number;
        $user->dob = $data->dob;
        $user->gender = $data->gender;
        $user->marital_status = $data->marital_status;
        $user->spouse_name = $data->spouse_name;
        $user->occupation = $data->occupation;
        $user->save();

        return back();
    }
}
