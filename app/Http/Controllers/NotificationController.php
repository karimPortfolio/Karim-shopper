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
        $product = Product::where('id', $notification->data['product'])->first();
        $buyer = User::where('id', $notification->data['buyer_id'])->first();
        $notification->update(['read_at' => now()]);
        return view('dashboard.notification', compact(['product','notification','buyer']));
    }
}
