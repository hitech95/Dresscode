<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCurrentEmployee()
    {
        return redirect()->route('admin.employee.show', ['id' => Auth::guard('admin')->user()->id]);
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
