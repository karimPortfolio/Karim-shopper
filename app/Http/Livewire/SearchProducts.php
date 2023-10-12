<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SearchProducts extends Component
{

    public $search , $brandFilter = [] , $ratingFilter=[],$sortBy;

    protected $queryString = [
        "search",
        "brandFilter" => ['except' => '' , 'as' => 'filter'],
        "ratingFilter",
        "sortBy" => ['except' => '' , 'as' => 'sortby'],
    ];

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
        return view('livewire.search-products' , [
              "products" => $products,
              "brands" => $brands,
              "search" => $this->search,
              "numProdFound" => $numProdFound,
        ]);
    }
}
