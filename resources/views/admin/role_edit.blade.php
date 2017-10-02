@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    @if(isset($role))
                        <li><a href="{{ route('admin.roles') }}">Roles</a></li>
                        <li><a href="{{ route('admin.role.show', ['id'=> $role->id]) }}">Role: {{ $role->name }}</a>
                        </li>
                        <li class="active">Edit Role</li>
                    @else
                        <li class="active">New Role</li>
                    @endif
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Role</div>
                    <div class="panel-body">
                        @if(isset($role))
                            {!! Form::model($role, ['route' => ['admin.role.update', $role->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        @else
                            {!! Form::open(['route' => 'admin.role.store', 'class' => 'form-horizontal']) !!}
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

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', __('app.description'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('description', old('description'), ['class' => 'form-control', 'required' => 'required']) !!}

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('enabled') ? ' has-error' : '' }}">
                            {!! Form::label('enabled', __('app.enable'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('enabled', '1', old('enabled')) !!}

                                @if ($errors->has('enabled'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('enabled') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('owner_platform') ? ' has-error' : '' }}">
                            {!! Form::label('owner_platform', 'Platform Owner', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('owner_platform', '1', old('owner_platform')) !!}

                                @if ($errors->has('owner_platform'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('owner_platform') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_platform') ? ' has-error' : '' }}">
                            {!! Form::label('shop_platform', 'Shop Owner', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('shop_platform', '1', old('owner_platform')) !!}

                                @if ($errors->has('shop_platform'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_platform') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop', 'Manage Shop', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop', '1', old('manage_shop')) !!}

                                @if ($errors->has('manage_shop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop_carts') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop_carts', 'Manage Shop', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop_carts', '1', old('manage_shop_carts')) !!}

                                @if ($errors->has('manage_shop_carts'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop_carts') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop_employees') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop_employees', 'Manage Shop\'s Employees', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop_employees', '1', old('manage_shop_employees')) !!}

                                @if ($errors->has('manage_shop_employees'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop_employees') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop_orders') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop_orders', 'Manage Shop\'s Orders', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop_orders', '1', old('manage_shop_orders')) !!}

                                @if ($errors->has('manage_shop_orders'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop_orders') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop_orders') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop_orders', 'Manage Shop\'s Orders', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop_orders', '1', old('manage_shop_orders')) !!}

                                @if ($errors->has('manage_shop_orders'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop_orders') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop_products') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop_products', 'Manage Shop\'s Products', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop_products', '1', old('manage_shop_products')) !!}

                                @if ($errors->has('manage_shop_products'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop_products') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shop_tickets') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shop_tickets', 'Manage Shop\'s Tickets', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shop_tickets', '1', old('manage_shop_tickets')) !!}

                                @if ($errors->has('manage_shop_tickets'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shop_tickets') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_brands') ? ' has-error' : '' }}">
                            {!! Form::label('manage_brands', 'Manage Brands', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_brands', '1', old('manage_brands')) !!}

                                @if ($errors->has('manage_brands'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_brands') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_carts') ? ' has-error' : '' }}">
                            {!! Form::label('manage_carts', 'Manage Carts', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_carts', '1', old('manage_carts')) !!}

                                @if ($errors->has('manage_carts'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_carts') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_employees') ? ' has-error' : '' }}">
                            {!! Form::label('manage_employees', 'Manage Employees', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_employees', '1', old('manage_carts')) !!}

                                @if ($errors->has('manage_employees'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_employees') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_orders') ? ' has-error' : '' }}">
                            {!! Form::label('manage_orders', 'Manage Orders', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_orders', '1', old('manage_orders')) !!}

                                @if ($errors->has('manage_orders'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_orders') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_roles') ? ' has-error' : '' }}">
                            {!! Form::label('manage_roles', 'Manage Roles', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_roles', '1', old('manage_roles')) !!}

                                @if ($errors->has('manage_roles'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_roles') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_shops') ? ' has-error' : '' }}">
                            {!! Form::label('manage_shops', 'Manage Shops', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_shops', '1', old('manage_shops')) !!}

                                @if ($errors->has('manage_shops'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_shops') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manage_tickets') ? ' has-error' : '' }}">
                            {!! Form::label('manage_tickets', 'Manage Tickets', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::checkbox('manage_tickets', '1', old('manage_tickets')) !!}

                                @if ($errors->has('manage_tickets'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manage_tickets') }}</strong>
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
