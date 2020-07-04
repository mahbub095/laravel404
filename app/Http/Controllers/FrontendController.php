<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
    	return view('frontend');

    	//return redirect()->action('FrontendController@contact');
    	//return redirect()->route('user');

    }

    public function contact(){
    	return view('frontend.contact');
    }
    public function checkout(){
        return view('checkout');
    }
    public function productsdetails(){
        return view('productsdetails');
    }
}
