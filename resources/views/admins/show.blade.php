@extends('layouts.ame-master')

@section('content')
    <style>
        .titleAbsolute{
            position: absolute;
        }
    </style>
    <script type="text/javascript">
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x) {
                return true;
            }
            else {
                event.preventDefault();
                return false;
            }
        }
    </script>
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
                                            <button class="btn btn-success" onclick="location.href='{{route('vendors.edit',$vendor->id)}}'"> Edit </button>
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['vendors.destroy', $vendor->id,], 'method' => 'DELETE', 'onsubmit' => 'ConfirmDelete()']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger confirm']) !!}
                                            {!! Form::close() !!}
                                        </td>


                                    </tr>
                                @endforeach
                                <button class="btn btn-success pull-right" onclick="location.href='{{route('vendors.create',$vendor->id)}}'"> Add Vendor </button>
                                <!--                    <button class="btn-danger pull-left" onclick="location.href='#'"> Back </button>-->
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