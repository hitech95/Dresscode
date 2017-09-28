<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Auth::guard('admin')->user();

        if ($employee->can('lists', Shop::class)) {
            $shops = Shop::all();
            return view('admin.shops', compact('shops'));
        } else {
            $id = null;
            return show($id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Auth::guard('admin')->user();

        if ($employee->can('create', Shop::class)) {
            return view('admin.shop_edit');
        }
        return abort(404);
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

        if ($employee->can('create', Shop::class)) {
            $data = $request->all();
            $this->validator($data)->validate();

            if (array_key_exists('phone', $data) && isset($data['phone'])) {
                $data['phone'] = PhoneNumber::make($data['phone'], 'IT');
            }

            if (array_key_exists('fax', $data) && isset($data['phone'])) {
                $data['fax'] = PhoneNumber::make($data['fax'], 'IT');
            }

            $shop = Shop::create([
                'name' => $data['name'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'fax' => $data['fax'],
                'vat' => $data['vat'],
            ]);

            if (array_key_exists('slug', $data) && isset($data['slug'])) {
                $shop->slug = $data['slug'];
                $shop->save();
            }

            return redirect()->route('admin.shops');
        }

        return abort(404);
    }

    /**show
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Auth::guard('admin')->user();
        $shop = Shop::findOrFail($id);

        if ($employee->can('show', $shop)) {
            return view('admin.shop_show', compact('shop'));
        }

        return abort(404);
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
        $shop = Shop::findOrFail($id);

        if ($employee->can('update', $shop)) {
            return view('admin.shop_edit', compact('shop'));
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Auth::guard('admin')->user();
        $shop = Shop::findOrFail($id);

        if ($employee->can('update', $shop)) {

            $data = $request->all();
            $this->validator($data)->validate();

            if (array_key_exists('phone', $data) && isset($data['phone'])) {
                $data['phone'] = PhoneNumber::make($data['phone'], 'IT');
            }

            if (array_key_exists('fax', $data) && isset($data['phone'])) {
                $data['fax'] = PhoneNumber::make($data['fax'], 'IT');
            }

            $shop->update($data);

            return redirect()->route('admin.shop_show', compact('id'));
        }

        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO
    }

    /**
     * Get a validator for an incoming store request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'slug' => 'sometimes|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|nullable|phone:IT',
            'fax' => 'sometimes|nullable|phone:IT',
        ]);
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
