@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.brands') }}">Brands</a></li>
                    <li class="active">Brand: {{ $brand->name }}</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            Brand Detail: {{ $brand->name }}
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ route('admin.brand.edit', ['id' => $brand->id]) }}">
                                Edit Brand
                            </a>
                            <a class="btn btn-danger" href="{{ route('admin.brand.destroy', ['id' => $brand->id]) }}">
                                Delete Brand
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <section class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $brand->name }}</td>
                                </tr>

                                <tr>
                                    <td>Slug</td>
                                    <td>{{ $brand->slug }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
