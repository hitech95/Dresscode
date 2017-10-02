@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    @if(isset($brand))
                        <li><a href="{{ route('admin.brands') }}">Brands</a></li>
                        <li><a href="{{ route('admin.brand.show', ['id'=> $brand->id]) }}">Brand: {{ $brand->name }}</a>
                        </li>
                        <li class="active">Edit Brand</li>
                    @else
                        <li class="active">New Brand</li>
                    @endif
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Brand</div>
                    <div class="panel-body">
                        @if(isset($brand))
                            {!! Form::model($brand, ['route' => ['admin.brand.update', $brand->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        @else
                            {!! Form::open(['route' => 'admin.brand.store', 'class' => 'form-horizontal']) !!}
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
