@extends('layouts.ame-master')

@section('content')
    @include('partials._dish-script')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ame-title">
                        Create Dish
                        <a href="{{ route('stalls.show', $stall_id) }}">
                            <span class="glyphicon glyphicon-remove pull-right"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(array('url'=>'/dishes','method'=>'POST', 'files'=>true)) !!}

                        {{ csrf_field() }}

                        <div class="form-group col-md-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Dish name" required>
                            </div>
                        </div>


                        {{ Form::hidden('stall', $stall_id) }}

                        <div class="form-group col-md-6 col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                                {{ Form::select('ingredients', $ingredients, null, array('class'=>'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                                {{ Form::select('ingredients0', $ingredients, null, array('class'=>'form-control')) }}
                            </div>
                        </div>

                        <div id="new_ing"> </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>

                        <button type = "button" onclick="addrow()" class="btn btn-primary pull-left">Add ingredient</button>
                        <div id="success" class="col-sm-1 col-sm-offset-1"> </div>
                        {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection