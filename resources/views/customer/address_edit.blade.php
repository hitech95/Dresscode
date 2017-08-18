@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="{{ route('customer.profile') }}">Utente</a></li>
                    <li role="presentation"><a href="{{ route('customer.orders') }}">Ordini</a></li>
                    <li class="active" role="presentation"><a href="{{ route('customer.ticket') }}">Messaggi</a></li>
                    <li role="presentation"><a href="{{ route('customer.addresses') }}">Indirizzi</a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Benvenuto, {{ $customer->name }}</div>
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                            <td>No#</td>
                            <td>Oggetto</td>
                            <td>Stato</td>
                            <td>Aggiornato</td>
                            </thead>
                            @foreach ($addresses as $address)
                                <tr>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->zip }}</td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->district }}</td>
                                    <td>{{ $address->company }}</td>
                                    <td>{{ $address->name }}</td>
                                    <td>{{ $address->surname }}</td>
                                    <td>{{ $address->phone }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection