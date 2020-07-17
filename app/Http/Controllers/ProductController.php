<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class ProductController extends Controller
{

    public function proform (){


        $categories = DB::select('select * from category');
        return View('backend.product',['categories'=>$categories]);
    }


    public function showallpro (){
        $products = DB::select('select * from product');
        return View('backend.showallpro',['products'=>$products]);
    }

    public function productsdetails($id)
    {
      /*  $pro=DB::table('product')
            ->where('id',$id)
            ->first();*/
        $pro = DB::select('select * from product where id = ?', [$id]);
        return view('productsdetails', compact('pro'));
     //   var_dump($pro);
    }

    public function save(Request $request){


        $category_id=$request->category_id;

        $buy_price=$request->buy_price;
        $title=$request->title;
        $tags=$request->tag;
        $regular_price=$request->regular_price;
        $flate_price=$request->flate_price;
        $rating=$request->rating;
        $shortdes=$request->shortdes;
        $tag=$request->tag;
        $product_info=$request->product_info;
        $product_position=$request->product_positionProductController;

        DB::insert('insert into product(title,regular_price,flate_price,shortdes,product_info,cat_id,buy_price,tag,product_position)value(?,?,?,?,?,?,?,?,?)',[$title,$regular_price,$flate_price,$shortdes,$product_info,$category_id,$buy_price,$tags,$product_position]);
        $count =  count($request->images);
        $product_last_id = DB::getPdo()->lastInsertId();

        for ($i = 0; $i < count($request->images); $i++) {
            $images = $request->images;
            $image = $images[$i];
            $name = time() . $i . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('product-image');
            $image->move($destinationPath, $name);
            $image_url = 'product-image/' . $name;
            DB::insert('insert into product_image(product_id,image_url)value(?,?)',[$product_last_id,$image_url]);


        }

        DB::table('product')
            ->where('id', $product_last_id)
            ->update(['feature_image' => $image_url]);

        Session::flash('message',' added successfully!');
        return redirect()->action('ProductController@proform');

    }
    public function prodelete($id)
    {
        DB::select('delete from  product where id =?', [$id]);
        Session::flash('message', 'Successfully Delete');
        return redirect()->action('ProductController@showallpro');

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

    public function cart(){
        if(session('cart')){
            $category=DB::select('select * from category');
            return view('ecommerce.admin.cart',['categories'=>$category]);

        }
        else{

            return redirect()->action('CategoryConteroller@showproductbycat');

        }

    }

    public function cartdetails(){
        return view('cart');
    }



   public function addToCart($id)
    {
        $product =DB::table('product')->where('id', $id)->first();

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "id" =>$product->id,
                    "title" =>$product->title,
                    "quantity" => 1,
                    "regular_price" => $product->regular_price,
                    "flate_price" => $product->flate_price,
                    "photo" => $product->feature_image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" =>$product->id,
            "title" =>$product->title,
            "quantity" => 1,
            "regular_price" => $product->regular_price,
            "flate_price" => $product->flate_price,
            "photo" => $product->feature_image
        ];


        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
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
