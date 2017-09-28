@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">@lang('customer.your-profile')</li>
        </ol>
        <div class="page-header">
            <h1>@lang('customer.your-profile')</h1>
            <span class="lead">@lang('app.welcome',['name' => $customer->name])</span>
        </div>
        <div class="panel panel-default with-nav-tabs">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    <ul class="nav nav-tabs">
                        <li class="active" role="presentation">
                            <a href="{{ route('customer.dashboard') }}">@lang('customer.dashboard')</a>
                        </li>
                        <li role="presentation">
                            <a href="{{ route('customer.orders') }}">@lang('customer.orders')</a>
                        </li>
                        <li role="presentation">
                            <a href="{{ route('customer.tickets') }}">@lang('customer.tickets')</a>
                        </li>
                        <li role="presentation">
                            <a href="{{ route('customer.addresses') }}">@lang('customer.addresses')</a>
                        </li>
                    </ul>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ route('customer.profile') }}">
                        @lang('customer.edit-profile')
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <section class="table-responsive">
                    <h2> @lang('customer.orders-recent')</h2>
                    <table class="table table-condensed table-stripe">
                        <thead>
                        <tr>
                            <td>@lang('customer.order-id')</td>
                            <td>@lang('customer.order-status')</td>
                            <td>@lang('customer.order-date')</td>
                            <td>@lang('customer.order-last-updated')</td>
                            <td>@lang('customer.order-paid')</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </section>
                <section class="table-responsive">
                    <h2> @lang('customer.tickets-open')</h2>
                    <table class="table table-condensed table-stripe">
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
                        <tbody>
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
                        </tbody>
                    </table>
                </section>
                <section class="table-responsive">
                    <h2> @lang('customer.profile-info')</h2>
                    <table class="table table-condensed">
                        <tbody>
                        <tr>
                            <td>@lang('app.name')</td>
                            <td>{{ $customer->name }}</td>
                        </tr>

                        <tr>
                            <td>@lang('app.surname')</td>
                            <td>{{ $customer->surname }}</td>
                        </tr>

                        <tr>
                            <td>@lang('app.phone')</td>
                            @if(isset($customer->phone))
                                <td>{{ $customer->phone->formatInternational() }}</td>
                            @else
                                <td>
                                    <a class="btn btn-link" href="{{ route('customer.profile') }}">
                                        @lang('customer.edit-profile')
                                    </a>
                                </td>
                            @endif
                        </tr>

                        <tr>
                            <td>@lang('app.email')</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
@endsection