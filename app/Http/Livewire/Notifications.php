<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class Notifications extends Component
{
    public function render()
    {
        $user_id = auth()->user()->id;
        $notifications = Notification::where("notifiable_id", $user_id)->orderBy('created_at', 'desc')->get();


        return view('livewire.notifications', [
            'notifications' => $notifications,
        ]);
    }
}
