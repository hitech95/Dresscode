@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.roles') }}">Roles</a></li>
                    <li class="active">Role: {{ $role->name }}</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            Role Detail: {{ $role->name }}
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ route('admin.role.edit', ['id' => $role->id]) }}">
                                Edit Role
                            </a>
                            <a class="btn btn-danger" href="{{ route('admin.role.destroy', ['id' => $role->id]) }}">
                                Delete Role
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <section class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $role->name }}</td>
                                </tr>

                                <tr>
                                    <td>Slug</td>
                                    <td>{{ $role->slug }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
