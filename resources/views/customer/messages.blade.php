@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('customer.profile') }}">Il tuo profilo</a></li>
            <li class="active">Messaggi</li>
        </ol>
        <div class="page-header">
            <h1>I tuoi messaggi</h1>
        </div>
        <div class="panel panel-default with-nav-tabs">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="{{ route('customer.profile') }}">Profilo</a></li>
                    <li role="presentation"><a href="{{ route('customer.orders') }}">Ordini</a></li>
                    <li class="active" role="presentation"><a href="{{ route('customer.tickets') }}">Messaggi</a></li>
                    <li role="presentation"><a href="{{ route('customer.addresses') }}">Indirizzi</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                    <td>No#</td>
                    <td>Oggetto</td>
                    <td>Stato</td>
                    <td>Aggiornato</td>
                    </thead>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection