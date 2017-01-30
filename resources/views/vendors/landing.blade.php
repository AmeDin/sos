@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>My Stalls <span>

                </div>
                <div class="rows">
                    <div class="panel-body pad-top-five">

                            @if($stalls->count() > 0)
                                @foreach($stalls as $indexKey => $stall)
                                <div class="col-md-3 col-xs-6 cardCustoms">

                                    <div class="mycard cardCustoms">
                                        <div class="image text-center">
                                                <a href="{{ route('stalls.show', $stall->id) }}"><img src="{{asset('images/' . $stall->image->url )}} " height="120" width="180" class="add-top-spacing"></a>
                                        </div>
                                        <div class="content text-center">
                                            <div class="info">
                                                <h3 class="nil-mp">{{ $stall->name }}</h3></a>
                                                <hr>
                                                <div class="col-md-6 col-xs-6 cardCustoms">
                                                    <a href="{{ route('stalls.show', $stall->id) }}"><i class="fa fa-search fa-3x"></i></a>
                                                </div>
                                                <div class="col-md-6 col-xs-6 cardCustoms">
                                                    <a href="{{ route('stalls.edit', $stall->id) }}"><i class="fa fa-pencil fa-3x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @if($stalls->count() == $indexKey+1 )
                                        @include('partials._nostall')
                                    @endif
                                @endforeach

                            @else
                                @include('partials._nostall')
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection