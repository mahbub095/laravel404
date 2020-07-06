<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginform( ){

    	return view('backend.loginform');
    }
    public function checklogin(Request $request)
    {
        echo $request ->input('username');
        echo $request ->input('password');
    }

    public function show($id){
    	return $id;
    }

     public function display($name){
    	return $name;
    }
    public function saveConsultation(Request $request){
        //echo "aste parchi";
        //echo $request->input('name');
        //echo $request->input('email');
        //echo $request->url();
        $all = $request->all();
        var_dump($all);

    }
}
