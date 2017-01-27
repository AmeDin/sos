@extends('layouts.ame-master')

@section('content')
    @include('partials._dish-script')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Dish
                </div>

                <div class="panel-body">
                    {!! Form::model($dish, ['route' => ['dishes.update', $dish->id], 'method' => 'PUT', 'files'=>true]) !!}
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Dish name']) !!}
                        </div>
                    </div>
                    @if(! empty($dish))
                        <script>
                            var i=-2;
                        </script>
                        @foreach($dish->ingredients as $key => $ingredient)
                            <div class="form-group col-md-6 col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                                    {{ Form::select('ingredients' . 0 . $key , $ingredients, $ingredient->id -1, array('class'=>'form-control')) }}
                                    <i class="fa fa-close add-hover" onclick="removeIngredient(this, i)"></i>
                                </div>
                            </div>
                            <script>
                                i= i +1;;
                            </script>
                        @endforeach
                    @endif

                    <div id="new_ing"> </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="img-responsive">Current image<br/><img src="{{asset('images/' . $dish->image->url)}} " height="100" width="100"/></div>

                    <button type = "button" onclick="addrow()" class="btn btn-primary pull-left">Add ingredient</button>
                    <div id="success" class="col-sm-1 col-sm-offset-1"> </div>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('dishes.show', 'Cancel', array($dish->id), array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save updates', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection