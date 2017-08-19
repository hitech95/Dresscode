<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;

class CustomerProfileController extends Controller
{
    /**
     * Show the application's customer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view('customer.profile', ['customer' => Auth::guard('frontend')->user()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editDashboard()
    {
        return view('customer.profile_edit', ['customer' => Auth::guard('frontend')->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateDashboard(Request $request)
    {
        $customer = Auth::guard('frontend')->user();

        $data = $request->all();
        $this->validator($data)->validate();

        if (array_key_exists('phone', $data)) {
            $data['phone'] = PhoneNumber::make($data['phone'], 'IT')->formatE164();
        }

        if (array_key_exists('password', $data)) {
            $data['password'] = bcrypt($data['password']);
        }

        if (array_key_exists('email', $data)) {
            unset($data['email']);
        }

        $customer->update($data);
        return redirect()->route('customer.profile');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'sometimes|nullable|phone:IT',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
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
