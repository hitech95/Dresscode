@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('customer.dashboard') }}">@lang('customer.your-profile')</a></li>
                    <li ><a href="{{ route('customer.addresses') }}">@lang('customer.your-addresses')</a></li>
                    @if(isset($address))
                        <li class="active">@lang('customer.edit-address')</li>
                    @else
                        <li class="active">@lang('customer.add-address')</li>
                    @endif
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('customer.edit-address')</div>
                    <div class="panel-body">
                        @if(isset($address))
                            {!! Form::model($address, ['route' => ['customer.addresses.update', $address->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        @else
                            {!! Form::open(['route' => 'customer.addresses.store', 'class' => 'form-horizontal']) !!}
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

                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            {!! Form::label('company', __('app.company'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('company', old('company'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', __('app.address'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('address', old('address'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            {!! Form::label('city', __('app.city'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('city', old('city'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            {!! Form::label('zip', __('app.zip'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('zip', old('zip'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                            {!! Form::label('district', __('app.district'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('district', old('district'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
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
                                @if(isset($address))
                                    {!! Form::submit(__('app.edit'), ['class' => 'btn btn-primary']) !!}
                                @else
                                    {!! Form::submit(__('app.add'), ['class' => 'btn btn-primary']) !!}
                                @endif
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection