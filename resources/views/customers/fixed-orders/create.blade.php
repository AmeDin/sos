@extends('layouts.ame-master')

@section('content')
    @include('partials._order-script')
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
                                            {{ Form::hidden('defIngredient' . $key , $ingredient->id) }}
                                            <center>
                                                @if($ingredient->category->id == 2 || $ingredient->category->id == 4 )
                                                    {{ Form::select('ingredients'.$key, $quantity, 0, array('class'=>'form-control small', 'data-ing' => $ingredient->id)) }}
                                                @else
                                                    {{ Form::select('ingredients'.$key, $size, 1, array('class'=>'form-control medium', 'data-ing' => $ingredient->id)) }}
                                                @endif
                                            </center>
                                        </div>
                                    @endforeach
                                <div id="new_ing"> </div>
                                {{ Form::hidden('dish', $dish->id) }}
                                <div class="col-md-10 col-xs-10 cardCustoms add-minor-top-spacing">
                                    <button type = "button" onclick="addrow()" class="btn btn-primary pull-left">Add Sides</button>
                                </div>
                                <div class="col-md-2 col-xs-2 cardCustoms add-minor-top-spacing">
                                    {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                                </div>
                                {!! Form::close() !!}
                                @endif
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2">
                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                    <th colspan="2">Nutrition Info</th>
                                </tr>
                                </thead>
                                <tbody id="nutritionBody">
                                @foreach($nutrition as $key => $nutri)
                                    <tr>
                                        <th scope="row">{{ $key}}</th>
                                        <td class="text-right">{{ $nutri }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection