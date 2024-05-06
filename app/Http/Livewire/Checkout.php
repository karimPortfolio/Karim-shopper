<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{
    public $carts , $cartsProducts=[] , $totalProductAmount=0;

    public $fullname , $address , $city , $country , $postcode , $phone , $email ,$notes, $paymentid = NULL,$paymentmode = NULL;

    public $successmsg = NULL , $errormsg = NULL;

    protected $listeners = [
        "validationForAll",
    ];

    public function validationForAll () {
        $this->validate();
    }


    public function totalProductsAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where("user_id",Auth::user()->id)->get();
        foreach ($this->carts as $cartItem)
        {
            $product = Product::where("id" , $cartItem->product_id)->first();
            $this->totalProductAmount += $product->price * $cartItem->quantity ;
        }

        return $this->totalProductAmount;
    }

    public function allCartProducts()
    {
        $cart = Cart::where("user_id",Auth::user()->id)->get();
        foreach ($cart as $cartItems)
        {
            array_push($this->cartsProducts,DB::select("SELECT products.* , carts.quantity AS quantity FROM products , carts WHERE products.id = carts.product_id AND carts.id = $cartItems->id "));
        }
        return $this->cartsProducts;
    }

    public function rules()
    {
        return [
             "fullname" => "required|string|max:121",
             "email" => "required|string|max:121",
             "city" => "required|string|max:30",
             "country" => "required|string|max:30",
             "postcode" => "required|string|max:8|min:5",
             "address" => "required|string|max:300",
             "notes" => "required|string|max:500",
             "phone" => "required|string|max:11|min:10",
        ];
    }

    public function render()
    {
        $this->email = Auth::user()->email;
        $this->fullname = Auth::user()->name;
        $this->totalProductAmount = $this->totalProductsAmount();
        $this->carts = $this->allCartProducts();
        return view('livewire.checkout' , [
            "totalProductAmount" => $this->totalProductAmount,
            "cartProducts" => $this->carts,
        ]);
    }
}
