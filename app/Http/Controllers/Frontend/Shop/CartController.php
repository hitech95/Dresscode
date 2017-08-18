<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the application's customer cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view('shop.cart');
    }
}
