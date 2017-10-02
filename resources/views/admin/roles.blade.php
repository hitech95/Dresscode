@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li class="active">Roles</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            Roles
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ route('admin.role.create') }}">
                                Add Role
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td></td>
                            </tr>
                            </thead>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.role.show', ['id' => $role->id]) }}"
                                           class="btn btn-default">@lang('app.view')</a>
                                        <a href="{{ route('admin.role.edit', ['id' => $role->id]) }}"
                                           class="btn btn-default">@lang('app.edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
