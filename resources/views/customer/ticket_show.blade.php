@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('customer.dashboard') }}">@lang('customer.your-profile')</a></li>
            <li><a href="{{ route('customer.tickets') }}">@lang('customer.your-tickets')</a></li>
            <li class="active">@lang('customer.ticket-no', ['id' => $ticket->id])</li>
        </ol>
        <div class="title">
            <h1>{{ $ticket->subject }}</h1>
            <p class="lead"></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    @lang('customer.ticket-no', ['id' => $ticket->id])
                </div>
                <div class="pull-right">
                    @if($ticket->isComplete())
                        @if($customer->can('open', $ticket))
                            <a href="{{ route('customer.tickets.open', ['id' => $ticket->id]) }}"
                               class="btn btn-success">@lang('app.open')</a>
                        @endif
                    @else
                        <a href="#reply" class="btn btn-primary">@lang('app.reply')</a>
                        @if($customer->can('close', $ticket))
                            <a href="{{ route('customer.tickets.close', ['id' => $ticket->id]) }}"
                               class="btn btn-danger">@lang('app.close')</a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li>
                                <strong>@lang('customer.ticket-status')</strong>:
                                <span style="color: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>
                            </li>
                            <li>
                                <strong>@lang('customer.ticket-priority')</strong>: {{ $ticket->priority }}
                            </li>
                            <li>
                                <strong>@lang('customer.ticket-category')</strong>:
                                @isset($ticket->category_id)
                                <span style="color: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span>
                                @endisset
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li>
                                <strong>@lang('customer.ticket-employee')</strong>:
                                @isset($ticket->employee_id)
                                {{ $ticket->employee->name }} {{ $ticket->employee->surname }}
                                @endisset
                            </li>
                            <li>
                                <strong>@lang('customer.ticket-created')</strong>: {{ $ticket->created_at->toFormattedDateString() }}
                            </li>
                            <li>
                                <strong>@lang('customer.ticket-updated')</strong>: {{ $ticket->updated_at->toFormattedDateString() }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @foreach($comments as $message)
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left">
                        {{ $message->created_at->toFormattedDateString() }}
                    </div>
                    <div class="pull-right">
                        @if(isset($message->employee_id))
                            {{ $message->employee->name }}, {{ $message->employee->surname }}
                        @else
                            @lang('app.you')
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    {{$message->content}}
                </div>
            </div>
        @endforeach

        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    @lang('app.reply')
                </div>
                <div class="pull-right">
                    @if($ticket->isComplete())
                        @if($customer->can('open', $ticket))
                            <a href="{{ route('customer.tickets.open', ['id' => $ticket->id]) }}"
                               class="btn btn-success">@lang('app.open')</a>
                        @endif
                    @else
                        @if($customer->can('close', $ticket))
                            <a href="{{ route('customer.tickets.close', ['id' => $ticket->id]) }}"
                               class="btn btn-danger">@lang('app.close')</a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="panel-body">

                @if($customer->can('reply', $ticket))

                    {!! Form::open(['route' => ['customer.tickets.update', $ticket->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

                    <div class="container-fluid">
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            {!! Form::label('message', __('app.message'), ['class' => 'control-label']) !!}

                            {!! Form::textarea('message', old('message'), ['class' => 'form-control vresize', 'required' => 'required']) !!}

                            @if ($errors->has('message'))
                                <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::submit(__('app.reply'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                @else
                    <div class="text-center">
                        <h2>@lang('customer.ticket-closed')</h2>
                        <p class="lead">@lang('customer.ticket-closed-detail')</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection