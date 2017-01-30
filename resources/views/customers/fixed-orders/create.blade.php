@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>What's in your {{ $dish->name }}?</h2>
                </div>
                <div class="panel panel-body text-center">
                    <div class="rows">
                        <div class="panel-body pad-top-five">
                            @include('partials._message')
                                @if(! empty($dish))
                                {!! Form::open(array('url'=>'/fixedOrders','method'=>'POST', 'files'=>true)) !!}
                                    @foreach($dish->ingredients as $key => $ingredient)
                                        <div class="col-md-4 col-xs-6 cardCustoms text-center">
                                            {{ $ingredient->name }}
                                            <center>
                                                @if($ingredient->category->id == 2 || $ingredient->category->id == 4 )
                                                    {{ Form::select('ingredients'.$key, $quantity, 0, array('class'=>'form-control small')) }}
                                                @else
                                                    {{ Form::select('ingredients'.$key, $size, 1, array('class'=>'form-control medium')) }}
                                                @endif
                                            </center>
                                        </div>
                                    @endforeach
                                {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                                {!! Form::close() !!}
                                @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection