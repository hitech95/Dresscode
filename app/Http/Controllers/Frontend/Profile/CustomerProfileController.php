<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerProfileController extends Controller
{
    /**
     * Show the application's customer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view('customer.dashboard', ['customer' => Auth::guard('frontend')->user()]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:frontend');
    }
}
