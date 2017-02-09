@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading ame-title">
                    Add Vendor
                    <a href="{{ route('vendors.index') }}">
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </a>
                </div>

                <div class="panel-body">

                    {!! Form::open(array('route'=>'vendors.store','method'=>'POST')) !!}

                    {{ csrf_field() }}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session(('error')) }}
                        </div>
                    @elseif(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                        </div>
                    </div>

                    <div id="success"> </div>
                    {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection