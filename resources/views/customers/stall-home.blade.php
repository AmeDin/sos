@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>{{ $name }}</h2>
                </div>
                <div class="panel panel-body text-center">
                    <div class="col-md-2 col-md-offset-1 col-xs-4 customer-card">
                        <h2>Customize</h2>
                    </div>
                    <div class="col-md-2 col-md-offset-2 col-xs-4 customer-card">
                        <a href="{{ route('customers.mains', $id)}}"><h2>Mains</h2></a>
                    </div>
                    <div class="col-md-2 col-md-offset-2 col-xs-4 customer-card">
                        <h2>Promotion</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection