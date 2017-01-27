@extends('layouts.ame-master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 panel-title text-center text-white"> <h1>Self Ordering System</h1></div>

        </div>
        <hr>
        @include('partials._message')
        <div class="row">
            <div class="links">
                @if(Sentinel::check())
                    <form action="/logout" method="POST" id="logout-form">
                        {{ csrf_field() }}

                        <a href="#" onclick="document.getElementById('logout-form').submit()" class="btn btn-primary btn-xl page-scroll">Logout</a>
                    </form>
                @else
                    <div class="col-md-6 text-center">
                        <a href="/login" class="btn btn-primary btn-xl page-scroll sr-button">Login</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="/register" class="btn btn-primary btn-xl page-scroll sr-button">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
