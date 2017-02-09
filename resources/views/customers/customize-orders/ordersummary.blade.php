@extends('layouts.ame-master')

@section('content')

    <div class="container" >
        <div class="row" data-spy="affix" data-offset-top="50">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td><strong>Nutrition</strong></td>
                                    <td><strong>Portion</strong></td>
                                    <td><strong>Price</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->ingredients as $ingredient)

                                    <tr>
                                        <td> {{$ingredient->name}}</td>
                                        <td>
                                            <div class="glyphicon glyphicon-info-sign arrow" title={{ $ingredient->nutrition }}></div>
                                        </td>
                                        <td>{{$ingredient->pivot->portion }} </td>
                                        <td>{{$ingredient->price }} </td>


                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong></strong></td>
                                    <td class="thick-line text-right"></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Queue Number:</strong></td>

                                    <td class="no-line text-right">{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Total:</strong></td>

                                    <td class="no-line text-right">${{ $cost }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        {{-------------BUTTONS--------}}
                        <div>
                            <a href="{{ route('customers.index')}}" class="btn btn-danger pull-right" >Back to Home</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>








@endsection