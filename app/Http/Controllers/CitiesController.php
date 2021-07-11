<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use Yajra\DataTables\DataTables;


class CitiesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $cities = Cities::where('name',$request->name)->OrderBy('id', 'DESC')->get();
            return DataTables::of($cities)
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' =>'required',
        //     'email' =>'required|unique:clients,email',
        //     'document' =>'required',
        //     'addres' =>'required'
        //  ]);
        $cities =new Cities ($request->all());
        $cities->save();
    }
}
