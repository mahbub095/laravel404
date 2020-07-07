<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function proform()
    {
        return view('backend.product');
    }

    public function showallpro()
    {
        return view('backend.showallpro');
    }

    public function roleform()
    {

        if (Session::has('username')) {
            return view('backend.role');
        } else {
            Session::flash('message', 'Login First');
            return redirect()->route('loginform');
        }
    }

    public function showrole()
    {

        if (Session::has('username')) {
            return view('backend.showrole');
        } else {
            Session::flash('message', 'Login First');
            return redirect()->route('loginform');
        }
    }

    public function registration()
    {

        return view('backend.registration');
    }

    public function logout(Request $request)
    {

        $request->session()->forget('username');
        Session::flash('message', 'Login Success');
        return redirect()->action('UserController@loginform');
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

        $users = DB::select('select  * from user where username =? and password=?', [$username, $password]);


        if (count($users) > 0) {
            foreach ($users as $user) {
                /*   echo $user->id;
                   echo $user->username;
                   echo $user->password;*/
                $request->session()->put('username', $user->username);
                if ($username == $user->username && $password == $user->password) {
                    return redirect()->action('DashboardController@index');
                    echo "Login Success";

                }
                //var_dump($users);
                //exit();
                /*if ($username == "admin" && $password == "0123") {
                    return redirect()->action('DashboardController@index');
                    echo "Login Success";
                }*/
                else {
                    Session::flash('message', 'Sorry');
                    return redirect()->action('UserController@loginform');
                }
            }
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
