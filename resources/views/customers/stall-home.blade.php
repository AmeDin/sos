@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>{{ $name }}</h2>
                </div>
                <div class="row">
                    <a  href="{{ route('customers.mains', $id)}}">
                        <div class="col-xs-3 col-xs-offset-1 btnstall outline"><h2 class="text-center">Mains</h2></div></a>

                    <a href="{{ route('customers.customize', $id)}}">
                        <div class="col-xs-3 col-xs-offset-1 btnstall outline"><h2>Customize</h2></div></a>

                    <a  href="{{ route('customers.promotion', $id)}}">
                        <div class="col-xs-3 col-xs-offset-1  btnstall outline"><h2>Promotion</h2></div></a>

                </div>
            </div>
        </div>
    </div>
@endsection