@extends('layouts.ame-master')

@section('content')
    <div class="row add-top-spacing">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading bg-orange">
                    <h3 class="panel-title"> Login </h3>
                </div>

                <div class="panel-body">
                    <form action="/login" method="POST">
                        {{ csrf_field() }}

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session(('error')) }}
                            </div>
                        @elseif(session('success'))
                            <div class="alert alert-success" role="alert">

                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envolope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <a href="/forgot-password">Forgot your password?</a>
                        <div class="form-group">
                            <input type="submit" value="login" class="btn btn-success pull-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection