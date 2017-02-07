@extends('layouts.ame-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-8 col-md-offset-0 col-xs-offset-2 ">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <div class="col-md-12">
                            {!! Form::open(['route' => ['stalls.destroy', $stall->id,], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete-btn']) !!}
                            {!! Form::close() !!}
                            <a href="{{ route('stalls.edit', $stall->id) }}"><i class="fa fa-pencil fa-2x pull-right detail"></i></a>
                            <h2>{{ $stall->name }}</h2>
                        </div>
                        <div class="panel-body text-center">
                            <img class="img-responsive" src="{{asset('images/' . $stall->image->url)}} " height="150" width="200"/>
                            <h4><span><button class="btn-danger btn-block" onclick="location.href='{{ route('promotions.show',$stall->id) }}'"> Promotions </button></span></h4>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-9 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h3><span><button class="btn-danger pull-left point-seven" onclick="location.href='{{ route('stalls.index') }}'"> Back </button></span>
                            Dishes</h3>
                        </div>
                        <div class="rows">
                            <div class="panel-body pad-top-five">
                                @include('partials._message')
                                @if($dishes->count() > 0)
                                    @foreach($dishes as $indexKey => $dish)
                                        <div class="col-md-3 col-xs-6 cardCustoms">

                                            <div class="mycard cardCustoms">
                                                <div class="image text-center">
                                                    <a href="{{ route('dishes.show', $dish->id) }}"><img src="{{asset('images/' . $dish->image->url )}} " height="120" width="180" class="add-top-spacing"></a>
                                                </div>
                                                <div class="content text-center">
                                                    <div class="info">
                                                        <h3 class="nil-mp">{{ $dish->name }}</h3></a>
                                                        <h5>Ingredients</h5>
                                                        <ul>
                                                            @if(! empty($dish))
                                                                @foreach($dish->ingredients as $key => $ingredient)
                                                                    @if($key<3)
                                                                        <li> {{ $ingredient->name }}</li>
                                                                    @endif
                                                                    @if($dish->ingredients->count() == 4 && $key == 3)
                                                                        <li> {{ $ingredient->name }}</li>
                                                                    @elseif($key==4)
                                                                        <li> many more...</li>
                                                                           @break
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                        </ul>
                                                            <a href="{{ route('dishes.show', $dish->id) }}"><i class="fa fa-search fa-2x pull-right detail"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($dishes->count() == $indexKey + 1)
                                            @include('partials._nodish')
                                        @endif
                                    @endforeach

                                @else
                                    @include('partials._nodish')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>

@endsection