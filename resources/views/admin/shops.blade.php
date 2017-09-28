@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                    <li class="active">Shops</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">Shops</div>
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td>Owner</td>
                                <td>Creation Date</td>
                                <td></td>
                            </tr>
                            </thead>
                            @foreach ($shops as $shop)
                                <tr>
                                    <td>{{ $shop->id }}</td>
                                    <td>{{ $shop->name }}</td>
                                    <td>{{ $shop->slug }}</td>
                                    <td>
                                        @isset( $shop->owner->name)
                                            {{ $shop->owner->name }}
                                        @endisset
                                    </td>
                                    <td>{{ $shop->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="{{ route('admin.shop.show', ['id' => $shop->id]) }}"
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
