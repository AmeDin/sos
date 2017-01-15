@extends('layouts.master')

@section('content')
    <script>
        var i = 1;
        function addrow() {
            $('#new_ing').append('<div id="added' + i + '" class="form-group"><div class="input-group">' +
                    '<span class="input-group-addon"><i class="fa fa-coffee"></i></span>' +
                    '<select class="form-control" name="ingredients' + i + '">' +
                    '<option value="0">White Rice</option>' +
                    '<option value="1">Lemak Rice</option>' +
                    '<option value="2">Seasoned Rice</option>' +
                    '<option value="3">Whole Chicken</option>' +
                    '<option value="4">1/2 Chicken</option>' +
                    '<option value="5">Small Chicken</option' +
                    '><option value="6">Carrot</option>' +
                    '<option value="7">Lettuce</option>' +
                    '<option value="8">Onion</option>' +
                    '<option value="9">Cucumber</option>' +
                    '<option value="10">Trout</option>' +
                    '<option value="11">Salmon</option>' +
                    '<option value="12">Tilapia</option>' +
                    '<option value="13">Prawn</option>' +
                    '<option value="14">Sambal</option>' +
                    '<option value="15">Mayonnaise</option>' +
                    '</select> </div></div> ');
            i++;
            console.log(i);
        }

        function removerow(){
            if(i>1){
                $("#added"+(i-1)).remove();
                i--;
                console.log(i);
            }
        }
    </script>
    <style>
    </style>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Dish
                    <a href="{{ route('stalls.show', $stall_id) }}">
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </a>
                </div>

                <div class="panel-body">

                    {!! Form::open(array('url'=>'/dishes','method'=>'POST', 'files'=>true)) !!}

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Dish name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>

                    {{ Form::hidden('stall', $stall_id) }}

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                            {{ Form::select('ingredients', $ingredients, null, array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div id="new_ing"> </div>

                    <button type = "button" onclick="addrow()" class="btn btn-primary pull-left">Add ingredient</button>
                    <div id="success" class="col-sm-1 col-sm-offset-1"> </div>
                    <button type = "button" onclick="removerow()" class="btn btn-danger">Remove ingredient</button>
                    {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection