@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>Order Summary</h2>
                </div>
                <div class="panel panel-body text-center">
                    <div class="rows">
                        <div class="col-md-4 col-xs-12">
                            <img class="pull-right" src="{{asset('images/' . $order->dish->image->url)}} " height="300" width="300"/>
                        </div>
                        <div class="col-md-8 col-xs-12 text-left">
                            <h2> {{$order->dish->name}} </h2>
                            <table class="table">
                            @foreach($order->ingredients as $ingredient)
                                    <tr>
                                        @if($ingredient->category_id == 2 || $ingredient->category_id == 4)
                                            <td>{{ $ingredient->name }}</td> <td> x{{ $ingredient->pivot->quantity }}</td>
                                        @else
                                            <td>{{ $ingredient->name }}</td>
                                            <td> @if ($ingredient->pivot->quantity == 0)
                                                    Less
                                                @elseif ($ingredient->pivot->quantity == 1)
                                                    Standard
                                                @else
                                                    More
                                                @endif</td>
                                        @endif
                                    </tr>
                            @endforeach
                                <tr><td>Total:</td><td> ${{ $cost }}</td></tr>
                            </table>
                            <button class="btn btn-primary pull-right" onclick="location.href='{{ route('customers.index') }}'"> Back to Main </button></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection