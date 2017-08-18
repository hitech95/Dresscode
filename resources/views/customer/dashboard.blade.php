@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Il tuo profilo</li>
        </ol>
        <div class="page-header">
            <h1>Il tuo profilo</h1>
            <span class="lead">Benvenuto, {{ $customer->name }}</span>
        </div>
        <div class="panel panel-default with-nav-tabs">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active" role="presentation"><a href="{{ route('customer.profile') }}">Profilo</a></li>
                    <li role="presentation"><a href="{{ route('customer.orders') }}">Ordini</a></li>
                    <li role="presentation"><a href="{{ route('customer.tickets') }}">Messaggi</a></li>
                    <li role="presentation"><a href="{{ route('customer.addresses') }}">Indirizzi</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $customer->name }}</td>
                    </tr>

                    <tr>
                        <td>Surname</td>
                        <td>{{ $customer->surname }}</td>
                    </tr>

                    <tr>
                        <td>E-Mail</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection