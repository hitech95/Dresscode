@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.customers') }}">Customers</a></li>
                    <li class="active">Profile</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            Profile: {{ $customer->name }} {{ $customer->surname }}
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default"
                               href="{{ route('admin.customer.edit', ['id' => $customer->id]) }}">
                                Edit Customer
                            </a>
                            <a class="btn btn-danger"
                               href="{{ route('admin.customer.destroy', ['id' => $customer->id]) }}">
                                Delete Customer
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            <span class="col-md-4">@lang('app.name')</span>

                            <div class="col-md-6">
                                {{ $customer->name }}
                            </div>
                        </div>

                        <div>
                            <span class="col-md-4">@lang('app.surname')</span>

                            <div class="col-md-6">
                                {{ $customer->surname }}
                            </div>
                        </div>

                        <div>
                            <span class="col-md-4">@lang('app.email')</span>

                            <div class="col-md-6">
                                {{ $customer->email }}
                            </div>
                        </div>

                        <div>
                            <span class="col-md-4">@lang('app.phone')</span>

                            <div class="col-md-6">
                                {{ $customer->phone }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
