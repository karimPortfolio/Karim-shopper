<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchProduct(Request $request)
    {
         $search = $request->search;
         $matchedProducts = Product::where('product_name','LIKE','%'.$search.'%')->get();
         if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id OR session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
         return view('search.Search' , compact(["matchedProducts","numProducts","search"]));
    }
}
