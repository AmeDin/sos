@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My Stalls</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Stall Name</th>
                                <th>Image</th>
                                <th>Remove</th>
                                <th>Edit</th>
                            </thead>
                            <tbody>

                                @if(! empty($stalls))
                                    @foreach($stalls as $stall)
                                        <tr>
                                            <th>{{ $stall->id }}</th>
                                            <td>{{ $stall->name }}</td>
                                            <td><img src="{{asset('images/' . $images[$count][0]['url'])}} " height="100" width="100"/></td>
                                            <td>
                                                {!! Form::open(['route' => ['stalls.destroy', $stall->id,], 'method' => 'DELETE']) !!}
                                                {!! Form::submit('Delete') !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td><button onclick="location.href='{{ route('stalls.edit', $stall->id) }}'">Edit</button></td>
                                        </tr>
                                        <div class="text-hide">{{ $count ++ }}</div>
                                    @endforeach
                                        <button class="btn-success pull-right" onclick="location.href='{{ route('stalls.create') }}'"> Add Stall </button>
                                @else
                                    <div class="alert alert-danger">
                                        No stalls found. click add button to create one. <button class="btn-success pull-right" onclick="location.href='{{ route('stalls.create') }}'"> Add </button>
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection