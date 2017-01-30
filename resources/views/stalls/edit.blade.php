@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Stall
                </div>

                <div class="panel-body">
                    {!! Form::model($stall, ['route' => ['stalls.update', $stall->id], 'method' => 'PUT', 'files'=>true]) !!}
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Stall name', ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="img-responsive text-center">Current image<br/><img src="{{asset('images/' . $stall->image->url)}} " height="100" width="100"/></div>
                    </div>

                    <div id="success"> </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('stalls.show', 'Cancel', array($stall->id), array('class' => 'btn btn-danger btn-block')) !!}
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