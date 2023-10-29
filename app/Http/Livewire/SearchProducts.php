<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Whishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchProducts extends Component
{

    public $search , $brandFilter = [] , $ratingFilter=[],$sortBy;

    protected $queryString = [
        "search",
        "brandFilter" => ['except' => '' , 'as' => 'filter'],
        "ratingFilter",
        "sortBy" => ['except' => '' , 'as' => 'sortby'],
    ];

    public function addToWhishlist($id)
    {


        if (Auth::user())
        {
            $user_id = Auth::user()->id;
            $matchedProducts = Whishlist::where("user_id" , $user_id)
            ->where("product_id",$id)->get();

            if (count($matchedProducts) > 0)
            {
                $whishlistProduct =Whishlist::where("user_id" , $user_id)
                ->where("product_id",$id);
                $whishlistProduct->delete();
                // $this->whishlistManageMsg = "Product has been remove from your whishlist";
                session()->flash("message" , "Product has been remove from your whishlist");

            } else {
                $newWhishlistProduct = new Whishlist;
                $newWhishlistProduct->product_id = $id;
                $newWhishlistProduct->user_id = $user_id;
                $newWhishlistProduct->save();
                session()->flash("message" , "Product has been add to your whishlist");
            }
        }else{
            session()->flash("error" , "You need to login to your account first.");
        }
    }


    public function render()
    {
        $search = $this->search;
        $products = Product::where('product_name','LIKE','%'.$search.'%')
        ->when($this->brandFilter , function ($q) {
            $q->whereIn('brand' , $this->brandFilter);
        })
        ->when($this->ratingFilter , function ($q) {
                $q->whereIn('product_rating' , $this->ratingFilter);
        })
        ->when($this->sortBy , function ($q) {
            $q->when($this->sortBy == "low" , function ($q2) {
                $q2->orderBy('price' , 'ASC');
            })
            ->when($this->sortBy == "high" , function ($q2) {
                $q2->orderBy('price' , 'DESC');
            })
            ->when($this->sortBy == "date" , function ($q2) {
                $q2->orderBy('created_at' , 'ASC');
            });
        }
        )
        ->paginate(6);
        $products->withPath("/search?search=$search");
        $numProdFound = Product::where('product_name','LIKE','%'.$search.'%')
        ->when($this->brandFilter , function ($q) {
            $q->whereIn('brand' , $this->brandFilter);
        })
        ->when($this->ratingFilter , function ($q) {
                $q->whereIn('product_rating' , $this->ratingFilter);
        })
        ->when($this->sortBy , function ($q) {
            $q->when($this->sortBy == "low" , function ($q2) {
                $q2->orderBy('price' , 'ASC');
            })
            ->when($this->sortBy == "high" , function ($q2) {
                $q2->orderBy('price' , 'DESC');
            })
            ->when($this->sortBy == "date" , function ($q2) {
                $q2->orderBy('created_at' , 'ASC');
            });
        }
        )
        ->count();

        $brands = DB::select("SELECT DISTINCT brand FROM products WHERE product_name  LIKE '%$search%' ");
        $whishlistProducts = Whishlist::all();
        return view('livewire.search-products' , [
              "products" => $products,
              "brands" => $brands,
              "search" => $this->search,
              "numProdFound" => $numProdFound,
              "whishlistProducts"=>$whishlistProducts,
        ]);
    }
}
