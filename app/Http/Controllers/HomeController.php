<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    //
    public function index(){


        return view('layout.view');
    }

    public function autocomplete(){
        //$term = Input::get('destination_city');
        $term = Input::get('term');;

        $results = array();

        $queries = DB::table('cities')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->take(7)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        }
        return response()->json($results);
    }
}
