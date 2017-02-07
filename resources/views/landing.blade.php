@extends('layouts.ame-master')

@section('content')

    <div class="container add-top-spacing">
        <div class="row">
            <div class="col-md-12 col-xs-12 panel-title text-center text-white"> <h1>Self Ordering System</h1></div>

        </div>
        <hr>
        @include('partials._message')
        <div class="row">
            <div class="links">
                @if(Sentinel::check())
                    <div class="col-md-12 text-center">
                        <form action="/logout" method="POST" id="logout-form">
                            {{ csrf_field() }}

                            <a href="#" onclick="document.getElementById('logout-form').submit()" class="btn btn-primary btn-xl page-scroll">Logout</a>
                        </form>
                    <div>
                @else
                    <div class="col-md-6 text-center">
                        <a href="/login" class="btn btn-primary btn-xl page-scroll sr-button add-top-spacing">Login</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="/register" class="btn btn-primary btn-xl page-scroll sr-button add-top-spacing">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
