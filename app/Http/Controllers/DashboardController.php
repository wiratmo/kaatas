<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	return view('layouts.dashboard.layout');
    }

    public function postPesan(Request $request){
    	return $request->all();
    }
}
