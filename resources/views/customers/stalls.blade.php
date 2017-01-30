@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>Select Stall</h2>

                </div>
                <div class="rows">

                    <div class="panel-body pad-top-five">
                        @if(ceil($stalls->count()/ 8) > 1)
                            <div id="slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                        @endif
                        @if($stalls->count() > 0)
                            @foreach($stalls as $indexKey => $stall)
                                @if($indexKey  < 8)
                                    @include('partials._customer-stalls')
                                @endif
                            @endforeach

                        @else
                            <div>No Stalls</div>
                        @endif
                        @if(ceil($stalls->count()/ 8) > 1)
                            </div>

                        @endif
                        @if(ceil($stalls->count()/ 8) > 1)
                            <div class="item">
                            @foreach($stalls as $indexKey => $stall)
                                @if($indexKey  >= 8)
                                    @include('partials._customer-stalls')
                                @endif
                            @endforeach

                        @endif


                        @if($stalls->count() > 8)
                                    </div>
                                </div>
                                <a class="left carousel-control override-carousel-control" href="#slider" data-slide="prev">&#10094;</a>
                                <a class="right carousel-control override-carousel-control" href="#slider" data-slide="next">&#10095;</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection