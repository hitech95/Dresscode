@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('customer.dashboard') }}">@lang('customer.your-profile')</a></li>
            <li class="active">@lang('customer.your-tickets')</li>
        </ol>
        <div class="page-header">
            <h1>@lang('customer.your-tickets')</h1>
        </div>
        <div class="panel panel-default with-nav-tabs">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a
                                    href="{{ route('customer.dashboard') }}">@lang('customer.dashboard')</a></li>
                        <li role="presentation"><a href="{{ route('customer.orders') }}">@lang('customer.orders')</a>
                        </li>
                        <li class="active" role="presentation"><a
                                    href="{{ route('customer.tickets') }}">@lang('customer.tickets')</a></li>
                        <li role="presentation"><a
                                    href="{{ route('customer.addresses') }}">@lang('customer.addresses')</a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ route('customer.tickets.create') }}">
                        @lang('customer.add-ticket')
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <td>@lang('customer.ticket-id')</td>
                        <td>@lang('customer.ticket-subject')</td>
                        <td>@lang('customer.ticket-status')</td>
                        <td>@lang('customer.ticket-updated')</td>
                        <td>@lang('customer.ticket-employee')</td>
                        <td></td>
                    </tr>
                    </thead>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td><span style="color: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>
                            </td>
                            <td>{{ $ticket->updated_at->toFormattedDateString() }}</td>
                            <td>
                                @isset( $ticket->employee->name)
                                {{ $ticket->employee->name }}
                                @endisset
                            </td>
                            <td>
                                <a href="{{ route('customer.tickets.show', ['id' => $ticket->id]) }}"
                                   class="btn btn-default">@lang('app.view')</a>
                                @if($ticket->isComplete())
                                    @if($customer->can('open', $ticket))
                                        <a href="{{ route('customer.tickets.open', ['id' => $ticket->id]) }}"
                                           class="btn btn-default">@lang('app.open')</a>
                                    @endif
                                @else
                                    @if($customer->can('close', $ticket))
                                        <a href="{{ route('customer.tickets.close', ['id' => $ticket->id]) }}"
                                           class="btn btn-default">@lang('app.close')</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection