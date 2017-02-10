@extends('layouts.ame-master')

@section('content')
    <style>
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2> My Earnings </h2>
                    </div>

                    <div class="panel-body">
                        @include('partials._message')
                        @if(count($orders) > 0)
                            <table class="table">
                                <thead>
                                <th>Time</th>
                                <th>Dish Sold</th>
                                <th>Earnings</th>
                                </thead>
                                <tbody>
                                @foreach($orders as $indexKey => $order)
                                    <tr class="text-center">
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->dish->name}}</td>
                                        <td>${{$earnings[$indexKey]}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-right">Total: </td>
                                    <td class="text-center">${{ $total  }}</td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            <h3 class="text-orange">No dishes sold yet.</h3>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection