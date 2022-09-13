<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;

class OrderCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = isset($event->order) ? $event->order : false;

        if ($order) {
            $product_id = $order->product_id;
            $product_amount = $order->product_amount;
            $product = Product::where('id', $product_id)->first();
            $product->stock -= $product_amount;
            $product->save();
        }
    }
}
