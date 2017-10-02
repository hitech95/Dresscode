<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Auth::guard('admin')->user();
        if ($employee->can('create', Role::class)) {

            return view('admin.role_edit');
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

        if ($employee->can('create', Role::class)) {

            $data = $request->all();
            $this->validator($data)->validate();

            Role::create($data);

            return redirect()->route('admin.roles');
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
        $employee = Auth::guard('admin')->user();
        $role = Role::findOrFail($id);

        if ($employee->can('view', $role)) {

            return view('admin.role_show', compact('role'));
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
        $role = Role::findOrFail($id);

        if ($employee->can('update', $role)) {

            return view('admin.role_edit', compact('role'));
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
        $role = Role::findOrFail($id);

        if ($employee->can('update', $role)) {

            $data = $request->all();
            $this->validator($data)->validate();

            $role->update($data);

            return redirect()->route('admin.rule.show', compact('id'));
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
        $role = Role::findOrFail($id);

        if ($employee->can('delete', $role)) {
            $role->delete();

            return redirect()->route('admin.roles');
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
            'slug' => 'sometimes|nullable|string|max:255',
            'description' => 'required|string|max:255',
            'enabled' => 'sometimes|boolean',

            'owner_platform' => 'sometimes|boolean',
            'owner_shop' => 'sometimes|boolean',

            'manage_shop' => 'sometimes|boolean',
            'manage_shop_carts' => 'sometimes|boolean',
            'manage_shop_employees' => 'sometimes|boolean',
            'manage_shop_orders' => 'sometimes|boolean',
            'manage_shop_products' => 'sometimes|boolean',
            'manage_shop_tickets' => 'sometimes|boolean',

            'manage_brands' => 'sometimes|boolean',
            'manage_carts' => 'sometimes|boolean',
            'manage_employees' => 'sometimes|boolean',
            'manage_orders' => 'sometimes|boolean',
            'manage_products' => 'sometimes|boolean',
            'manage_roles' => 'sometimes|boolean',
            'manage_shops' => 'sometimes|boolean',
            'manage_tickets' => 'sometimes|boolean',
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
