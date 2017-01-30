@extends('layouts.ame-master')

@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="panel panel-default bg-grey-white">
            <div class="panel-heading text-center">
                <h2>Mains</h2>
            </div>
            <div class="panel panel-body text-center">
                <div class="rows">
                    <div class="panel-body pad-top-five">
                        @include('partials._message')
                        @if($dishes->count() > 0)
                            @foreach($dishes as $indexKey => $dish)
                                <div class="col-md-4 col-xs-6">
                                    <a href="{{ route('fixedOrders.create', $dish->id) }}">
                                    <div class="ccard customer-card re-rotate">
                                        <div class="cimage text-center">
                                            <img src="{{asset('images/' . $dish->image->url )}} " height="100%" width="180" class="add-top-spacing">
                                        </div>
                                        <div class="ccontent text-center">
                                            <div class="info">
                                                <h3 class="nil-mp">{{ $dish->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="hidden">{{ $indexKey++ }}</div>
                            @endforeach

                        @else
                            <h1>No Dish Found</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection