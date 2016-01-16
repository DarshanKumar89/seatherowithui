<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theater;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){

    	$theaters = Theater::all();
    	return view('index', compact('theaters'));

    }
}
