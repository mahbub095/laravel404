<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
       // return view('welcome');
    	//return view('frontend',['categories' => $categories]);
    	//return redirect()->action('FrontendController@contact');
        $categories = DB::select('select * from category');
        $products = DB::select('select * from product');
        return view('frontend', ['products' => $products],['categories' => $categories]);
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
    public function cartdetails(){
        return view('cartdetails');
    }
}
