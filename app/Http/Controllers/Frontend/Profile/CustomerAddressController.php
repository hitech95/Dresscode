<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
{
    /**
     * Show the application's customer addresses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Auth::guard('frontend')->user();
        $addresses = $customer->addresses;

        return view('customer.addresses', ['customer' => $customer, 'addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.address_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Auth::guard('frontend')->user();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Auth::guard('frontend')->user();
        $address = Address::find($id);

        if($customer->can('view', $address)){
            return view('customer.address_edit', ['address' => $address]);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Auth::guard('frontend')->user();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Auth::guard('frontend')->user();
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
