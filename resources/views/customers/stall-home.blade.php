@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>{{ $name }}</h2>
                </div>
                <div class="row">
                    <a style="color: #5e5e5e; text-align: center" href="{{ route('customers.mains', $id)}}">
                        <div class="col-md-3 col-md-offset-1 col-xs-4 btnstall outline"><h2>Mains</h2></div></a>

                    <a style="color: #5e5e5e; text-align: center" href="{{ route('customers.customize', $id)}}">
                        <div class="col-md-3 col-md-offset-1 col-xs-4 btnstall outline"><h2>Customize</h2></div></a>

                    <a style="color: #5e5e5e; text-align: center" href="{{ route('customers.promotion', $id)}}">
                        <div class="col-md-3 col-md-offset-1 col-xs-4 btnstall outline"><h2>Promotion</h2></div></a>

                </div>
            </div>
        </div>
    </div>
@endsection