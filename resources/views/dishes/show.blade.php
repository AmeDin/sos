@extends('layouts.ame-master')

@section('content')
    <style>
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>{{ $dish->name }}</h2>
                    </div>

                    <div class="panel-body">
                        @include('partials._message')
                        <img class="pull-right img-responsive" src="{{asset('images/' . $dish->image->url)}} " height="100" width="100"/>
                        <h4>Ingredients</h4>
                        <ul>
                            @if(! empty($dish))
                                @foreach($dish->ingredients as $ingredient)
                                    <li> {{ $ingredient->name }}</li>
                                @endforeach
                            @endif

                        </ul>

                        <span>Cost: ${{  number_format($dish->ingredients->sum('price'), 2) }}</span>


                    <h4>Nutrition Info</h4>
                    <table class="table">
                        <thead>
                            <th>Nutrition</th>
                            <th>Amount Per Serving</th>
                        </thead>
                        <tbody>
                        @foreach($nutrition['nutrition'] as $n)
                            <tr>
                                <td>{{$n['name']}}</td>
                                <td>{{$n['value']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <button class="btn-danger pull-left" onclick="location.href='{{ route('stalls.show', $dish->stall_id) }}'"> Back </button>
                        <button class="btn-success pull-right" onclick="location.href='{{ route('dishes.edit', $dish->id) }}'">Edit</button>
                        {!! Form::open(array('route' => ['dishes.destroy', $dish->id,], 'class'=>'pull-right','method' => 'DELETE')) !!}
                        {!! Form::submit('Delete', array('class'=>'btn-danger')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection