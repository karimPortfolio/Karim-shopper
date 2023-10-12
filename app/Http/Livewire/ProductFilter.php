<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductFilter extends Component
{

    public $cat , $brandFilter = [] , $ratingFilter=[] , $sortBy ;

    protected $queryString = [
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
                // $this->whishlistManageMsg = "Product has been to your whishlist";
                session()->flash("message" , "Product has been add to your whishlist");
            }
        }else{
            session()->flash("error" , "You need to login to your account first.");
        }
    }

    public function render()
    {
        //get products and products that matches the filtering
        $owner = User::get();
        $products = Product::whereBelongsTo($owner)->where('category' , $this->cat)
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
        )->paginate(6);

        //num products found with filtring
        $numProdFound = Product::where("category" , $this->cat)
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
        })->count();

        $category = $this->cat;
        $brands = DB::select("SELECT DISTINCT brand FROM products WHERE category = '$this->cat' ");
        $whishlistProducts = Whishlist::all();
        return view('livewire.product-filter' , [
            "products" => $products,
            "category" => $category,
            "numProdFound"=>$numProdFound,
            "sortBy"=>$this->sortBy,
            "brands"=>$brands,
            "whishlistProducts"=>$whishlistProducts,
        ]);
    }

}
