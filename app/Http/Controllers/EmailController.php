<?php

namespace App\Http\Controllers;


use App\Events\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EmailController extends Controller
{
    public function contactUs(Request $request) {

//        $contactData = Arr::only($request->toArray(),['name','email','message-title','comment']);
//
//        event(new ContactUs($contactData));

        return redirect()->back()
            ->with('success', 'Email Sent Successfully, Please Wait for the response :)');

    }
}
