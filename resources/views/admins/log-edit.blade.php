@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Log
                </div>

                <div class="panel-body">
                    {!! Form::model($log, ['route' => ['logs.update', $log->id], 'method' => 'PUT', 'files'=>true]) !!}
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('origin', null, ['class' => 'form-control', 'placeholder' => 'Origin', ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                            {!! Form::text('action', null, ['class' => 'form-control', 'placeholder' => 'Action', ]) !!}
                        </div>
                    </div>

                    <div id="success"> </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('logs.index', 'Cancel', array($log->id), array('class' => 'btn btn-danger btn-block')) !!}
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