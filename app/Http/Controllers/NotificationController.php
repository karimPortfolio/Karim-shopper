<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showNotification($id)
    {
        $notification = Notification::where('id', $id)->first();
        $notification->update(['read_at' => now()]);
        if ($notification->type === "App\Notifications\ProductSold")
        {
            $product = Product::where('id', $notification->data['product'])->first();
            $buyer = User::where('id', $notification->data['buyer_id'])->first();
            return view('dashboard.notification', compact(['product','notification','buyer']));
        }
        else
        {
            $product_id = $notification->data['product_id'];
            return redirect()->route('products.details', $product_id);
        }
    }
}
