<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
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
        return view("cart.Cart" , compact(["cart_products","numProducts" , "totalPrice"]));
    }


    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->session_id = $request->sessionId;
        $cart->product_id = $request->productId;
        $cart->quantity = $request->quantity;
        if (isset($request->user_id))
        {
            $cart->user_id = $request->user_id;
        }
        $cart->save();
        return redirect()->route("products.details",$request->productId)->with("message","add with success");
    }



    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->first();
        //return view("cart.Cart");
        return $product;
    }


    public function edit(Cart $cart)
    {
        //
    }


    public function update(Request $request, Cart $cart)
    {
        //
    }


    public function destroy($id)
    {
        $product = Cart::findOrFail($id);
        $product->first();
        $product->delete();
        return redirect()->route("cart")->with("message" , "Product has been removed from your cart.");
    }
}
