<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $customer = Auth::guard('frontend')->user();
        $tickets = Ticket::userTickets($customer->id)->with('status')->get();

        return view('customer.dashboard', compact('customer', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('customer.profile', ['customer' => Auth::guard('frontend')->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $customer = Auth::guard('frontend')->user();

        $data = $request->all();
        $this->validator($data)->validate();

        if ($request->has('phone')) {
            $data['phone'] = PhoneNumber::make($data['phone'], 'IT');
        }

        if ($request->has('email')) {
            unset($data['email']);
        }

        if ($request->has('password_change')) {
            if (Hash::check($data['password_old'], $customer->password)) {
                $data['password'] = bcrypt($data['password']);
            } else {
                return redirect()->back()->withErrors([
                    'password_old' => strtolower(__('validation.password', [
                        'attribute' => __('app.password-old')
                    ]))
                ]);
            }
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
        $rule = array(
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'sometimes|nullable|phone:IT',
        );

        if (array_key_exists('password_change', $data) && isset($data['password_change'])) {
            $rule = array(
                'password_old' => 'required|string',
                'password' => 'required|string|min:6|confirmed',
            );
        }

        return Validator::make($data, $rule);
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
