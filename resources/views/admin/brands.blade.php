@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li class="active">Brands</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">Brands</div>
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
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.brand.show', ['id' => $brand->id]) }}"
                                           class="btn btn-default">@lang('app.view')</a>
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
