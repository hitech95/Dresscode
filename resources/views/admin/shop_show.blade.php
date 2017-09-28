@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.shops') }}">Shops</a></li>
                    <li class="active">Shop: {{ $shop->name }}</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            Shop Detail: {{ $shop->name }}
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ route('admin.shop.edit', ['id' => $shop->id]) }}">
                                Edit Shop
                            </a>
                            <a class="btn btn-danger" href="{{ route('admin.shop.destroy', ['id' => $shop->id]) }}">
                                Delete Shop
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <section class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $shop->name }}</td>
                                </tr>

                                <tr>
                                    <td>Slug</td>
                                    <td>{{ $shop->slug }}</td>
                                </tr>

                                <tr>
                                    <td>Lat</td>
                                    <td>{{ $shop->latitude }}</td>
                                </tr>

                                <tr>
                                    <td>Long</td>
                                    <td>{{ $shop->longitude }}</td>
                                </tr>

                                <tr>
                                    <td>Phone</td>
                                    @if(isset($shop->phone))
                                        <td>{{ $shop->phone->formatInternational() }}</td>
                                    @else
                                        <td>
                                            <a class="btn btn-link" href="{{ route('customer.profile') }}">
                                                @lang('customer.edit-profile')
                                            </a>
                                        </td>
                                    @endif
                                </tr>

                                <tr>
                                    <td>Fax</td>
                                    @if(isset($shop->fax))
                                        <td>{{ $shop->fax->formatInternational() }}</td>
                                    @else
                                        <td>
                                            <a class="btn btn-link"
                                               href="{{ route('admin.shop.edit', ['id' => $shop->id]) }}">
                                                Edit Shop
                                            </a>
                                        </td>
                                    @endif
                                </tr>

                                <tr>
                                    <td>Vat</td>
                                    <td>{{ $shop->vat }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
