<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class RemoveOldCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove old carts at 24 hours ago!';

    private $carts;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        parent::__construct();
        $this->carts = $cart;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->carts->get()->map(function ($cart) {
            try {
                if (now()->diffInHours($cart->created_at) >= 24) {
                    $cart->items()->delete();
                    $cart->delete();
                }
            } catch (\Throwable $ex) {
                Log::notice(['message' => $ex->getMessage(), 'code' => $ex->getCode(), 'file' => $ex->getFile()]);
            }
        });
    }
}
