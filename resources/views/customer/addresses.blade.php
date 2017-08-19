@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('customer.profile') }}">Il tuo profilo</a></li>
            <li class="active">Indirizzi</li>
        </ol>
        <div class="page-header">
            <h1>I tuoi indirizzi</h1>
        </div>
        <div class="panel panel-default with-nav-tabs">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="{{ route('customer.profile') }}">Profilo</a></li>
                    <li role="presentation"><a href="{{ route('customer.orders') }}">Ordini</a></li>
                    <li role="presentation"><a href="{{ route('customer.tickets') }}">Messaggi</a></li>
                    <li class="active" role="presentation"><a href="{{ route('customer.addresses') }}">Indirizzi</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class="row is-table-row">
                        <div class="col-sm-4">
                            <div class="panel panel-primary fill-height">
                                <div class="panel-body">
                                    <a class="text-center" href="{{ route('customer.addresses.create') }}">
                                        <h3>Add a new</h3>
                                        <p>address</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @foreach ($addresses as $address)
                            <div class="col-sm-4">
                                <div class="panel panel-primary fill-height">
                                    @if($address->default)
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Default</h3>
                                        </div>
                                    @endif
                                    <div class="panel-body">
                                        <p>{{ $address->surname }} {{ $address->name }}</p>
                                        @isset($address->company)
                                            <p>{{ $address->company }}</p>
                                        @endisset
                                        <p>{{ $address->address }}</p>
                                        <p>{{ $address->city }}, {{ $address->district }} {{ $address->zip }}</p>
                                        <p>{{ $address->phone }}</p>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{ route('customer.addresses.edit', ['id' => $address->id]) }}">Edit</a> | <a href="#">Delete</a>
                                        @if(!$address->default)
                                            | <a href="#">Default</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection