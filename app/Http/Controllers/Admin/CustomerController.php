<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Auth::guard('admin')->user();
        if ($employee->can('lists', Customer::class)) {

            $customers = Customer::all();
            return view('admin.customers', compact('customers'));
        }

        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Auth::guard('admin')->user();
        if ($employee->can('create', Customer::class)) {

            return view('admin.customer_edit');
        }

        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Auth::guard('admin')->user();

        if ($employee->can('create', Customer::class)) {

            $data = $request->all();
            $this->validator($data)->validate();

            Customer::create($data);

            return redirect()->route('admin.customers');
        }

        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Auth::guard('admin')->user();
        $customer = Customer::findOrFail($id);

        if ($employee->can('view', $customer)) {
            return view('admin.customer_show', compact('customer'));
        }

        dd('hhhhhh');

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Auth::guard('admin')->user();
        $customer = Customer::findOrFail($id);

        if ($employee->can('update', $customer)) {

            return view('admin.customer_edit', compact('customer'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Auth::guard('admin')->user();
        $customer = Customer::findOrFail($id);

        if ($employee->can('update', $customer)) {

            $data = $request->all();
            $this->validator($data)->validate();

            if ($request->has('phone')) {
                $data['phone'] = PhoneNumber::make($data['phone'], 'IT');
            }

            if ($request->has('password_change')) {
                $data['password'] = bcrypt($data['password']);
            }

            $customer->update($data);

            return redirect()->route('admin.customer.show', compact('id'));
        }

        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Auth::guard('admin')->user();
        $customer = Customer::findOrFail($id);

        if ($employee->can('delete', $customer)) {

            $customer->delete();

            return redirect()->route('admin.customers');
        } else {
            abort(404);
        }
    }

    /**
     * Get a validator for an incoming store request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rule = array(
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'sometimes|nullable|phone:IT',
        );

        if (array_key_exists('password_change', $data) && isset($data['password_change'])) {
            $rule = array(
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
        $this->middleware('auth:admin');
    }
}
