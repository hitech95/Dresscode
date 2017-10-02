@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li class="active">Customers</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            Customers
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ route('admin.customer.create') }}">
                                Add Customer
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Surname</td>
                                <td>Email</td>
                                <td>Registered At</td>
                                <td></td>
                            </tr>
                            </thead>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->surname }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="{{ route('admin.customer.show', ['id' => $customer->id]) }}"
                                           class="btn btn-default">@lang('app.view')</a>
                                        <a href="{{ route('admin.customer.edit', ['id' => $customer->id]) }}"
                                           class="btn btn-default">@lang('app.edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
