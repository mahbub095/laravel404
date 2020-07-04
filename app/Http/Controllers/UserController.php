<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    	return view('frontend.user');
    }

    public function show($id){
    	return $id;
    }

     public function display($name){
    	return $name;
    }
    public function saveConsultation(){
        echo "aste parchi";
    }
}
