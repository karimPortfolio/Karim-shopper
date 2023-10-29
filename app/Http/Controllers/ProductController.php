<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index($cat)
    {
        $owner = User::get();
        $products = Product::whereBelongsTo($owner)->where('category' , $cat)->paginate(6);
        $numProdFound = Product::where("category" , $cat)->get()->count();
        $brands = DB::select("SELECT DISTINCT brand FROM products WHERE category = '$cat' ");
        $category = $cat;
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id OR session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
        return view("products.Produits",compact('products' , 'category' , 'owner' ,"numProducts","numProdFound","brands"));

    }

    public function homeProducts()
    {
        $products = DB::select("SELECT products.* , users.name FROM products , users WHERE products.user_id = users.id LIMIT 6 ");
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id OR session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
        return view('Home' , compact(["products","numProducts"]));
    }

    // public function getAllProducts()
    // {
    //     $products = Product::all();
    //     return view('home' , compact('products'));
    // }

    public function productDetails($id)
    {
        $product = DB::select("SELECT products.* , users.name FROM products , users WHERE products.user_id = users.id AND products.id = $id LIMIT 1");
        $productCateg = $product[0]->category;
        $productId = $product[0]->id;
        $similiar_products = DB::select("SELECT * FROM products WHERE category = '$productCateg' AND id <> $productId LIMIT 3");
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id OR session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
        return view("products.ProductDetails", compact(["product","similiar_products","numProducts"]));
    }

    public function userProductsDashboard()
    {
        $user_id = Auth::user()->id;
        $userProducts = Product::where("user_id" , $user_id)->paginate(6);
        if (isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id OR session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }
        return view('dashboard.dashboardProduits' , compact('userProducts' , "numProducts"));
    }

    public function useraddproduct()
    {
        return view('dashboard.manageProducts.addproduct');
    }


    public function userDeleteProduct($id)
    {
        $isExist = Whishlist::where("product_id", $id)->get();
        if (count($isExist) === 0)
        {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('dashboard.products',$product->user_id)
                            ->with('success','Product has been deleted.');
        }else{
            $user_id = Auth::user()->id;
            return redirect()->route('dashboard.products',$user_id)
                             ->with('failed',"Deleting operation failed because your product has been added to other user's whishlist.");
        }
    }

    public function userInsertProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required | string',
            'price' => 'required | integer',
            'category' => 'required | string',
            'desc' => 'required | string'
        ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->desc;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->product_discount = $request->product_discount;
        $product->user_id = $request->user_id;
        if ($request->hasFile('image'))
        {
            $image=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/products'), $image);
            $product->image = $image;
        }
        $product->save();
        return redirect()->route('dashboard.products' , $request->user_id)->with('success','You have successfully add '.$request->product_name.' article');
    }

    public function userEditProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.manageProducts.editproduct' , compact('product'));
    }

    public function userUpdateProduct(Request $request , $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image'))
        {
            $image=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/products'), $image);
            $product->image = $image;
        }
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->desc;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->product_discount = $request->product_discount;
        $product->user_id = $request->user_id;
        $product->save();
        return redirect()->route('dashboard.products' , $request->user_id)->with('success','You have successfully edited '.$request->product_name.' product');
    }

}
