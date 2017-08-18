<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerTicketController extends Controller
{
    /**
     * Show the application's customer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMessages()
    {
        $customer = Auth::guard('frontend')->user();
        $tickets = Ticket::userTickets($customer->id)->with('status')->get();

        return view('customer.messages', ['customer' => $customer, 'tickets' => $tickets]);
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
