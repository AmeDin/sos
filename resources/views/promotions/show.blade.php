@extends('layouts.ame-master')

@section('content')
    <style>
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>{{ $stall->name }}</h2>
                    </div>
                    <div class="panel-body">
                        @include('partials._message')
                        <table class="table">
                            <thead>
                            <th>#</th>
                            <th>Promotion Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Start Promotion</th>
                            <th>End Promotion</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>

                            </thead>
                            <tbody>
                            @if(! empty($promotions))
                                @foreach($promotions as $promotion)
                                    <tr>
                                        <th>{{ $promotion->id }}</th>

                                        <td><a href="{{ route('promotions.show', $promotion->id) }}">{{ $promotion->name }}</a></td>
                                        <td>{{ $promotion->description }}</td>
                                        <td><img src="{{asset('images/' . $promotion->image->url )}} " height="100" width="100"/></td>
                                        <td>{{ $promotion->start_date }}</td>
                                        <td>{{ $promotion->end_date }}</td>
                                        <td>${{ $promotion->price }}</td>

                                        <td><button class="btn btn-success btn-block" onclick="location.href='{{ route('promotions.edit', $promotion->id) }}'"> Edit </button></td>
                                        <td>{!! Form::open(['route' => ['promotions.destroy', $promotion->id,], 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                <button class="btn-success pull-right" onclick="location.href='{{ route('promotions.create') }}'"> Add Promotion </button>
                                <button class="btn-danger pull-left" onclick="location.href='{{ route('stalls.show',$stall->id) }}'"> Back </button>
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