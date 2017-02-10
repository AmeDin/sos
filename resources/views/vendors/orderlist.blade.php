@extends('layouts.ame-master')

@section('content')

    <div class="container col-md-10 col-md-offset-2" >
        <div class="row">
            <div class="col-md-10">
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

                                   <td> </td>



                                </tr>
                                </thead>
                                <tbody>
                                <thead>

                                </thead>
                                @for($x = 0; $x < count($order); $x++)

                                @foreach($order[$x] as $eachorder)
                                        <tr>
                                            <th class="btn-danger" colspan="4">Order ID: {{$eachorder->id}}
                                                <span class="pull-right">Date Created: {{$eachorder->created_at}}</span>
                                            </th>

                                        </tr>
                                    @foreach($eachorder->ingredients as $ingredient)
                                    <tr>
                                    <td> {{$ingredient->name}}</td>
                                    <td>
                                    <div class="glyphicon glyphicon-info-sign arrow" title={{ $ingredient->nutrition }}></div>
                                    </td>
                                    <td>{{$ingredient->pivot->portion }} </td>
                                        <td class="thick-line"></td>



                                        @endforeach
                                        <tr>
                                            <td class="text-right" colspan="4"><strong>Total Price: $ {{$price}}  </strong></td>
                                        </tr>
                                    </tr>
                                    @endforeach
                                @endfor


                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong></strong></td>
                                    <td class="thick-line text-right"></td>
                                </tr>

                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><h2>Total Earnings:</h2></td>

                                    <td class="no-line text-right"><h2> $ {{$totalprice}}</h2></td>
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