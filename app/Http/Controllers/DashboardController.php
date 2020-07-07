<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
       // method for
        if(Session::has('username')){
            return view('backend.dashboard');
        }
        else{
            Session::flash('message', 'Save Done');
            return redirect()->route('loginform');
        }
    }
}
