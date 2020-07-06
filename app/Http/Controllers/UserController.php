<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use DB;

class UserController extends Controller
{
    public function loginform()
    {

        return view('backend.loginform');
    }

    public function registration()
    {

        return view('backend.registration');
    }

    public function registrationsave(Request $request)
    {
        $username = $request->input('username');
         $password = $request->input('password');
        Session::flash('message', 'Save Done');
        DB::insert('insert into user(username,password) values (?,?)', [$username, $password]);
        return redirect()->route('dashboard');
    }

    public function checklogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if ($username == "admin" && $password == "0123") {
            return redirect()->action('DashboardController@index');
            echo "Login Success";

        } else {
            Session::flash('message', 'Sorry');
            return redirect()->action('UserController@loginform');

        }
    }

    public function show($id)
    {
        return $id;
    }

    public function display($name)
    {
        return $name;
    }

    public function saveConsultation(Request $request)
    {
        //echo "aste parchi";
        //echo $request->input('name');
        //echo $request->input('email');
        //echo $request->url();
        $all = $request->all();
        var_dump($all);

    }
}
