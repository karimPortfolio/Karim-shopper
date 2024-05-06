<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $cart_products = DB::select("SELECT products.* ,carts.id AS cart_id , carts.quantity AS quantity FROM products , carts  WHERE carts.product_id = products.id AND carts.user_id = $user_id  ");
        } else {
            $session_id = session()->getId();
            $cart_products = DB::select("SELECT products.* , carts.id AS cart_id ,carts.quantity AS quantity  FROM products , carts  WHERE carts.session_id = '$session_id' AND carts.product_id = products.id ");
        }
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id AND session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $totalPrice = DB::select("SELECT  SUM(carts.quantity) AS total_quantity FROM products , carts  WHERE carts.user_id = $user_id  AND carts.product_id = products.id ");
        } else {
            $session_id = session()->getId();
            $totalPrice = DB::select("SELECT  SUM(carts.quantity) AS total_quantity FROM products , carts  WHERE carts.session_id = '$session_id' AND carts.product_id = products.id");
        }
        return view("checkout.checkout" , compact(["cart_products","numProducts" , "totalPrice"]));
    }

    public function paymentsSuccess()
    {
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $cart_products = DB::select("SELECT products.* ,carts.id AS cart_id , carts.quantity AS quantity FROM products , carts  WHERE carts.product_id = products.id AND carts.user_id = $user_id  ");
        } else {
            $session_id = session()->getId();
            $cart_products = DB::select("SELECT products.* , carts.id AS cart_id ,carts.quantity AS quantity  FROM products , carts  WHERE carts.session_id = '$session_id' AND carts.product_id = products.id ");
        }
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id AND session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $totalPrice = DB::select("SELECT  SUM(carts.quantity) AS total_quantity FROM products , carts  WHERE carts.user_id = $user_id  AND carts.product_id = products.id ");
        } else {
            $session_id = session()->getId();
            $totalPrice = DB::select("SELECT  SUM(carts.quantity) AS total_quantity FROM products , carts  WHERE carts.session_id = '$session_id' AND carts.product_id = products.id");
        }

        return view("checkout.checkoutComp.welcome" , compact(["cart_products","numProducts" , "totalPrice"]));
    }
}
