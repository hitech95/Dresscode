<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;

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
        $has_addresses = count($customer->addresses) > 0;

        $data = $request->all();
        $this->validator($data)->validate();

        if(array_key_exists('phone', $data)){
            $data['phone'] = PhoneNumber::make($data['phone'], 'IT')->formatE164();
        }

        Address::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'company' => $data['company'],
            'address' => $data['address'],
            'zip' => $data['zip'],
            'city' => $data['city'],
            'district' => $data['district'],
            'phone' => $data['phone'],
            'default' => !$has_addresses,
            'customer_id' => $customer->id,
            'invoice' => false
        ]);

        return redirect()->route('customer.addresses');
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
        $address = Address::ofCustomer($customer->id)->findOrFail($id);

        if($customer->can('edit', $address)){
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
        $address = Address::ofCustomer($customer->id)->findOrFail($id);

        if($customer->can('update', $address)){

            $data = $request->all();
            $this->validator($data)->validate();

            if(array_key_exists('phone', $data)){
                $data['phone'] = PhoneNumber::make($data['phone'], 'IT')->formatE164();
            }

            $address->update($data);
            return redirect()->route('customer.addresses');
        }else{
            abort(404);
        }
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
        $address = Address::customer($customer->id)->findOrFail($id);

        if($customer->can('delete', $address)){
            $address->delete();
            return redirect()->route('customer.addresses');
        }else{
            abort(404);
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'company' => 'sometimes|nullable|string|max:255',
            'address' => 'required|string',
            'zip' => 'required|digits:5',
            'city' => 'required|string',
            'district' => 'required|string',
            'phone' => 'sometimes|nullable|phone:IT',
        ]);
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
