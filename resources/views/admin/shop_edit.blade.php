@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    @if(isset($shop))
                        <li><a href="{{ route('admin.shops') }}">Shops</a></li>
                        <li><a href="{{ route('admin.shop.show', ['id'=> $shop->id]) }}">Shop: {{ $shop->name }}</a></li>
                        <li class="active">Edit Shop</li>
                    @else
                        <li class="active">New Shop</li>
                    @endif
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Shop</div>
                    <div class="panel-body">
                        @if(isset($shop))
                            {!! Form::model($shop, ['route' => ['admin.shop.update', $shop->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        @else
                            {!! Form::open(['route' => 'admin.shop.store', 'class' => 'form-horizontal']) !!}
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

                        @if(true)
                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                {!! Form::label('slug', __('app.slug'), ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    {!! Form::text('slug', old('slug'), ['class' => 'form-control']) !!}

                                    @if ($errors->has('slug'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            {!! Form::label('latitude', __('app.latitude'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('latitude', old('latitude'), ['class' => 'form-control']) !!}

                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            {!! Form::label('longitude', __('app.longitude'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('longitude', old('longitude'), ['class' => 'form-control']) !!}

                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
                            {!! Form::label('vat', __('app.vat'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('vat', old('vat'), ['class' => 'form-control']) !!}

                                @if ($errors->has('vat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', __('app.address'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
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

                        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                            {!! Form::label('fax', __('app.fax'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('fax', old('fax'), ['class' => 'form-control']) !!}

                                @if ($errors->has('fax'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
