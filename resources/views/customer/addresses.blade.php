@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('customer.dashboard') }}">@lang('customer.your-profile')</a></li>
            <li class="active">@lang('customer.your-addresses')</li>
        </ol>
        <div class="page-header">
            <h1>@lang('customer.your-addresses')</h1>
        </div>
        <div class="panel panel-default with-nav-tabs">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a
                                    href="{{ route('customer.dashboard') }}">@lang('customer.dashboard')</a></li>
                        <li role="presentation"><a href="{{ route('customer.orders') }}">@lang('customer.orders')</a>
                        </li>
                        <li role="presentation"><a href="{{ route('customer.tickets') }}">@lang('customer.tickets')</a>
                        </li>
                        <li class="active" role="presentation"><a
                                    href="{{ route('customer.addresses') }}">@lang('customer.addresses')</a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ route('customer.addresses.create') }}">
                        @lang('customer.add-address')
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row flex-row">
                        @forelse ($addresses as $address)
                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    @if($address->default)
                                        <div class="panel-heading">
                                            <h3 class="panel-title">@lang('app.default')</h3>
                                        </div>
                                    @endif
                                    <div class="panel-body">
                                        <ul class="list-unstyled">
                                            <li>{{ $address->surname }} {{ $address->name }}</li>
                                            @isset($address->company)
                                                <li>{{ $address->company }}</li>
                                            @endisset
                                            <li>{{ $address->address }}</li>
                                            <li>{{ $address->zip }} {{ $address->city }}, {{ $address->district }} </li>
                                            <li>{{ $address->phone->formatInternational() }}</li>
                                        </ul>
                                    </div>
                                    <div class="panel-footer">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ route('customer.addresses.edit', ['id' => $address->id]) }}">@lang('app.edit')</a>
                                            </li>
                                            @if($customer->can('delete', $address))
                                                <li>
                                                    <a href="{{ route('customer.addresses.destroy', ['id' => $address->id]) }}">@lang('app.delete')</a>
                                                </li>
                                            @endif
                                            @if(!$address->default)
                                                <li>
                                                    <a href="{{ route('customer.addresses.default', ['id' => $address->id]) }}">@lang('customer.address-default')</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-sm-12">
                                <div class="panel panel-primary fill-height">
                                    <div class="panel-body">
                                        <div class="container-fluid text-center">
                                            <h3>None here</h3>
                                            <p class="lead"><strong>:(</strong></p>
                                            <p class="lead">
                                                <a class="btn btn-default"
                                                   href="{{ route('customer.addresses.create') }}">
                                                    @lang('customer.add-address')
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection