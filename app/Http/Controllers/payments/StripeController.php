<?php

namespace App\Http\Controllers\payments;

use Stripe;
use Exception;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\ProductSold;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class StripeController extends Controller
{
    public function paymentStripe(Request $request)
    {

        //calc total price
        $totalProductAmount = 0;
        $carts = Cart::where("user_id", Auth::user()->id)->get();
        foreach ($carts as $cartItem) {
            $product = Product::where("id", $cartItem->product_id)->first();
            $totalProductAmount += $product->price * $cartItem->quantity ;
        }

        //getting cart products with quantity from carts table
        $cartsProducts = [];
        $cart = Cart::where("user_id", Auth::user()->id)->get();
        foreach ($cart as $cartItems) {
            array_push($cartsProducts, DB::select("SELECT products.* , carts.quantity AS quantity FROM products , carts WHERE products.id = carts.product_id AND carts.id = $cartItems->id "));
        }

        //get the total number of products in cart
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE user_id = $user_id OR session_id = '$session_id'");
        } else {
            $session_id = session()->getId();
            $numProducts = DB::select("SELECT count(*) AS num_products FROM carts  WHERE session_id = '$session_id'");
        }

        //to calc the total amount to pay
        $totalProductAmount = 0;
        $carts = Cart::where("user_id", Auth::user()->id)->get();
        foreach ($carts as $cartItem) {
            $product = Product::where("id", $cartItem->product_id)->first();
            $totalProductAmount += $product->price * $cartItem->quantity ;
        }

        //validate the order information entered by user
        $validated = $request->validate([
            "fullname" => "required|string|max:121",
            "email" => "required|string|max:121",
            "city" => "required|string|max:30",
            "country" => "required|string|max:30",
            "postcode" => "required|string|max:8|min:5",
            "address" => "required|string|max:300",
            "notes" => "required|string|max:500",
            "phone" => "required|string|max:11|min:10",
        ]);

        //create order and orderItems
        if ($validated) {
            $paymentmode = "Stripe payments";
            $order = Order::create([
                "user_id" => Auth::user()->id,
                "tracking_no" => "funda-".Str::random(10),
                "fullname" => $request->fullname,
                "email" =>$request->email,
                "phone" =>$request->phone,
                "city" =>$request->city,
                "country" =>$request->country,
                "postcode" =>$request->postcode,
                "address" =>$request->address,
                "notes" =>$request->notes,
                "status_message" => "in progress",
                "payment_mode" => $paymentmode,
                "payment_id" => null
            ]);

            foreach ($carts as $cartItem) {
                $productPrice = Product::where("id", $cartItem->product_id)->first();
                $orderItems = OrderItem::create([
                     "order_id" => $order->id,
                     "product_id" => $cartItem->product_id,
                     "quantity" =>$cartItem->quantity,
                     "price" =>$productPrice->price,
                ]);
                Product::where("id", $cartItem->product_id)->decrement("quantity", $cartItem->quantity);
            }
            return view("checkout.payments.stripe", compact(["totalProductAmount","numProducts" , "cartsProducts","totalProductAmount"]));
        }

        // return $request;
    }

    public function postPaymentStripe(Request $request)
    {
        $validate = $request->validate([
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
        ]);


        $input = $request->except('_token');

        if ($validate) {
            $stripe = new \Stripe\StripeClient(
                "sk_test_51N9mTHDulEW9VVeptGJ2MFKnCvEcBTrV37O8uWshMsOJctm7Y5dWB1TxnEgLZrv2FLSkxgRHs5UHPlzEbtsBUQpM008Qo1q7aD"
               // env("STRIPE_SECRET")
            );

            try {
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    return redirect()->route('stripe.add.money');
                }

                $charge = $stripe->charges->create([
                    'source' => $token->id,
                    'currency' => 'USD',
                    'amount' => $request->get("amount")*100,
                    'description' => 'wallet',
                ]);

                if ($charge->status == 'succeeded') {
                    $creditCard = $charge->payment_method_details->card->brand;
                    $amount = $charge->amount;
                    $carts = Cart::where("user_id", Auth::user()->id)->get();
                    foreach ($carts as $cartItem) {
                        $product = Product::where("id", $cartItem->product_id)->first();
                        $totPrice = $product->price * $cartItem->quantity;
                        Purchase::create([
                            "product_id" => $product->id,
                            "user_id" => $product->user_id,
                            "buyer_id" => Auth::user()->id,
                            "quantity" => $cartItem->quantity,
                            "price" => $totPrice,
                            "payment_method" => $creditCard,
                        ]);
                        $user = User::where("id", $product->user_id)->first();
                        $quantity = $cartItem->quantity;
                        Notification::send($user,new ProductSold($product, $quantity, $creditCard));
                    }
                    Cart::where("user_id", Auth::user()->id)->delete();
                    return redirect()->route("checkout.thankyou")->with("payments", true);
                } else {
                    return redirect()->route('addmoney.paymentstripe')->with('error', 'Money not add in wallet!');
                }
            } catch (Exception $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            }
        }
    }
}
