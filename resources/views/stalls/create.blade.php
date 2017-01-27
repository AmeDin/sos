@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Stall
                    <a href="{{ route('stalls.index') }}">
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </a>
                </div>

                <div class="panel-body">

                    {!! Form::open(array('url'=>'/stalls','method'=>'POST', 'files'=>true)) !!}

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Stall name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <!--<div class="control-group">
                        <div class="controls">
                            {!! Form::file('image') !!}
                            <p class="errors">{!!$errors->first('image')!!}</p>
                            @if(Session::has('error'))
                                <p class="errors">{!! Session::get('error') !!}</p>
                            @endif
                        </div>
                    </div>-->

                    <div id="success"> </div>
                    {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection