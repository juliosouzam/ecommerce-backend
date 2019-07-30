<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the models order "creating" event.
     *
     * @param  \App\Models\Order  $rder
     * @return void
     */
    public function creating(Order $order)
    {
        $counted = Order::count() + 1;
        $order->code = now()->format('Ym') . sprintf('%04d', $counted);
        $order->user_id = auth()->id();

        return $order;
    }

    /**
     * Handle the models order "created" event.
     *
     * @param  \App\Models\Order  $rder
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the models order "updated" event.
     *
     * @param  \App\Models\Order  $Order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the models order "deleted" event.
     *
     * @param  \App\Models\Order  $models\Order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the models order "restored" event.
     *
     * @param  \App\Models\Order  $models\Order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the models order "force deleted" event.
     *
     * @param  \App\Models\Order  $models\Order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
