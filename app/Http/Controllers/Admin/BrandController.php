<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Auth::guard('admin')->user();
        if ($employee->can('create', Brand::class)) {
            return view('admin.brand_edit');
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

        if ($employee->can('create', Brand::class)) {

            $data = $request->all();
            $this->validator($data)->validate();

            Brand::create($data);

            return redirect()->route('admin.brands');
        }

        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand_show', compact('brand'));
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
        $brand = Brand::findOrFail($id);

        if ($employee->can('update', $brand)) {
            return view('admin.brand_edit', compact('brand'));
        }
        return abort(404);
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
        $brand = Brand::findOrFail($id);

        if ($employee->can('update', $brand)) {

            $data = $request->all();
            $this->validator($data)->validate();

            $brand->update($data);

            return redirect()->route('admin.brand.show', compact('id'));
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
        $employee = Auth::guard('admin')->user();
        $brand = Brand::findOrFail($id);

        if ($employee->can('delete', $brand)) {

            $brand->delete();

            return redirect()->route('admin.brands');
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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'slug' => 'sometimes|string|max:255',
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
