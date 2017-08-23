@extends('layouts.frontend')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('customer.dashboard') }}">@lang('customer.your-profile')</a></li>
            <li><a href="{{ route('customer.tickets') }}">@lang('customer.your-tickets')</a></li>
            <li class="active">@lang('customer.add-ticket')</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">@lang('customer.add-ticket')</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'customer.tickets.store', 'class' => 'form-horizontal']) !!}
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                {!! Form::label('priority', __('app.priority'), ['class' => 'control-label']) !!}
                                {!! Form::select('priority', $priorities, old('subject'), ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="form-group">
                                {!! Form::label('category', __('app.category'), ['class' => 'control-label']) !!}
                                {!! Form::select('category', $categories, old('category'), ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        {!! Form::label('subject', __('app.subject'), ['class' => 'control-label']) !!}

                        {!! Form::text('subject', old('subject'), ['class' => 'form-control', 'required' => 'required']) !!}
                        <span class="help-block"></span>

                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        {!! Form::label('message', __('app.message'), ['class' => 'control-label']) !!}

                        {!! Form::textarea('message', old('message'), ['class' => 'form-control vresize', 'required' => 'required']) !!}
                        <span class="help-block"></span>

                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::submit(__('app.open'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection