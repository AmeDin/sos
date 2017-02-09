@extends('layouts.ame-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Logs</h2>
                    </div>
                    <div class="panel-body">
                        @include('partials._message')
                        <div class="col-md-1 col-md-offset-11">
                            {!! Form::open(['route' => ['logs.destroy'], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Clear Logs', ['class' => 'btn btn-danger delete-btn pull-right']) !!}
                            {!! Form::close() !!}
                        </div>
                        <table class="table text-center">
                            <thead>
                            <th>#</th>
                            <th>Origin</th>
                            <th>Action</th>
                            <th>Triggered By</th>
                            <th>Triggered On</th>
                            <th>Edit</th>

                            </thead>
                            <tbody>
                            @if(! empty($logs))
                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{ $log->id }}</td>
                                        <td>{{ $log->origin }}</td>
                                        <td>{{ $log->action }}</td>
                                        <td>{{ $log->user()->first()->name }}</td>
                                        <td>{{ $log->created_at }}</td>
                                        <td> <button class="btn-success" onclick="location.href='{{ route('logs.edit', $log->id) }}'"> Edit </button></td>

                                    </tr>
                                @endforeach
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