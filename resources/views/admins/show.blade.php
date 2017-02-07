@extends('layouts.ame-master')

@section('content')
    <style>
        .titleAbsolute{
            position: absolute;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Vendors</h2>
                    </div>
        <div class="panel-body">
            @include('partials._message')
            <table class="table">
                <thead>
                <th>#</th>
                <th>Vendor Name</th>
                <th>Email</th>
                <th>Stalls</th>
                <th>Edit</th>
                <th>Delete</th>

                </thead>
                <tbody>
                @if(! empty($vendors))
                    @foreach($vendors as $vendor)
                        <tr>
                            <td>{{ $vendor->id }}</td>
                            <td>{{ $vendor->name }}</td>
                            <td>{{ $vendor->email }}</td>
                            <td>
                                <button class="btn-info" onclick="location.href='#'"> View Stalls </button>
                            </td>
                            <td>
                                <button class="btn-success" onclick="location.href='#'"> Edit </button>
                            </td>
                            <td>
                                <button class="btn-danger" onclick="location.href='#'"> Delete </button>
                            </td>


                        </tr>
                    @endforeach
                    <button class="btn-success pull-right" onclick="location.href='#'"> Add Vendor </button>
                    <button class="btn-danger pull-left" onclick="location.href='#'"> Back </button>
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