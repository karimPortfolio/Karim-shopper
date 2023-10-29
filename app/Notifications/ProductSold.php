<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProductSold extends Notification
{
    use Queueable;
    private $product;
    private $quantity;
    private $paymentsMethod;

    public function __construct($product, $quantity, $creditCard)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->paymentsMethod = $creditCard;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Congratulations! Your Product Has Been Sold')
            ->greeting('Dear ' . $notifiable->name . ',')
            ->line('We are excited to inform you that your listed product, "' . $this->product->product_name . '", has been successfully sold through our platform. Congratulations on your sale!')
            ->line('Here are the details of the transaction:')
            ->line('Product Information:')
            ->line('- Product Name: ' . $this->product->product_name)
            ->line('- Product Price: $' . $this->product->price)
            ->line('- Buyer\'s Name: ' . Auth::user()->name)
            ->line('Payment Information:')
            ->line('- Payment Method: Stripe Payments')
            ->line('If you encounter any issues or have questions, feel free to reach out to our customer support team for assistance.')
            ->line('Thank you for choosing our platform to sell your products. We wish you continued success and many more sales in the future.')
            ->salutation("Best regards, Karim's Shopper");
    }

    public function toArray($notifiable)
    {
        return [
            'subject'=> "Your Product Has Been Sold",
            'content'=> Auth::user()->name.", has purchased ".$this->quantity." of your product:".$this->product->product_name." with ".$this->product->price."$ x".$this->quantity,
            'buyer_id' => Auth::user()->id,
            'product' => $this->product->id,
            'quantity'=> $this->quantity,
            'price'=> $this->product->price,
            'paymentsMethod' => $this->paymentsMethod,
        ];
    }
}
