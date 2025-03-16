<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Api\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashboardAnalytics()
    {
        $user_id = Auth::user()->id;
        $totalProducts = Product::where("user_id" , $user_id)->count();
        $purchaces = User::find($user_id)->purchase->count();
        $earnings = DB::select("SELECT SUM(price) AS earnings FROM purchases WHERE purchases.user_id = $user_id GROUP BY user_id ");
        $purchacesBuyer = Purchase::where("buyer_id" , $user_id)->count();
        $orders = Order::where("user_id", $user_id)->count();
        return view("dashboard.dashboard" , compact("totalProducts" , "purchaces" , "earnings","purchacesBuyer", "orders"));
    }

    public function userWhishlist()
    {
        $user_id = Auth::user()->id;
        $whishlistProducts = DB::select("SELECT products.* , whishlists.id AS whishlist_id FROM products,whishlists WHERE products.id = whishlists.product_id AND whishlists.user_id = $user_id");
        return view("dashboard.dashboardWhishlist" , compact("whishlistProducts"));
    }

    public function userOrders()
    {
        $user_id = Auth::user()->id;
         $userOrders = Order::where("user_id" , $user_id)->get();
        return view("dashboard.dashboardOrders",compact("userOrders"));
    }

    public function removeFromWhishlist($id)
    {
        Whishlist::where("product_id",$id)->where("user_id",Auth::user()->id)->delete();
        return redirect()->route("dashboard.whishlist");
    }

}
