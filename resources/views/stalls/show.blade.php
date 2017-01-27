@extends('layouts.ame-master')

@section('content')
    <style>
        .titleAbsolute{
            position: absolute;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <img class="titleAbsolute img-responsive" src="{{asset('images/' . $stall->image->url)}} " height="100" width="100"/>
                        <h2>{{ $stall->name }}</h2>
                    </div>

                    <div class="panel-body">
                        @include('partials._message')
                        <table class="table">
                            <thead>
                            <th>#</th>
                            <th>Dish Name</th>
                            <th>Image</th>
                            </thead>
                            <tbody>
                                @if(! empty($dishes))
                                    @foreach($dishes as $dish)
                                        <tr>
                                            <th>{{ $dish->id }}</th>
                                            <td><a href="{{ route('dishes.show', $dish->id) }}">{{ $dish->name }}</a></td>
                                            <td><img src="{{asset('images/' . $dish->image->url )}} " height="100" width="100"/></td>
                                        </tr>
                                    @endforeach
                                    <button class="btn-success pull-right" onclick="location.href='{{ route('dishes.create') }}'"> Add Dish </button>
                                    <button class="btn-danger pull-left" onclick="location.href='{{ route('stalls.index') }}'"> Back </button>
                                @else
                                    @include('partials._nostall')
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection