@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.customers') }}">Customers</a></li>
                    @if(isset($customer))
                        <li class="active">Edit Customer</li>
                    @else
                        <li class="active">New Customer</li>
                    @endif
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('customer.edit-profile')</div>
                    <div class="panel-body">
                        @if(isset($customer))
                            {!! Form::model($customer, ['route' => ['admin.customer.update', $customer->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        @else
                            {!! Form::open(['route' => 'admin.customer.store', 'class' => 'form-horizontal']) !!}
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', __('app.name'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            {!! Form::label('surname', __('app.surname'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('surname', old('surname'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', __('app.email'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {!! Form::label('phone', __('app.phone'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit(__('app.save'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                        @if(isset($customer))
                            <hr>
                            {!! Form::model($customer, ['route' => 'customer.profile.update', 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('password_change', '1') !!}

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::label('password', __('app.password'), ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {!! Form::label('password-confirm', __('app.password-confirm'), ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    {!! Form::password('password-confirm', ['name' => 'password_confirmation', 'class' => 'form-control']) !!}

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit(__('app.change'), ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
