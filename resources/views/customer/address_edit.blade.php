@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('customer.profile') }}">Il tuo profilo</a></li>
                    <li><a href="{{ route('customer.addresses') }}">Indirizzi</a></li>
                    <li class="active">Modifica indirizzo</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">Modifica indirizzo</div>
                    <div class="panel-body">
                        {!! Form::model($address, ['route' => ['customer.addresses.update', $address->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('surname', 'Surname', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('company', 'Company', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('zip', 'Zip', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('district', 'Province', ['class' => 'col-md-4 control-label']); !!}

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
                            {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']); !!}

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
                                {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection