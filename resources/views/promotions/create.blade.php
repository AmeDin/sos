@extends('layouts.ame-master')

@section('content')
    @include('partials._dish-script')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Promotion
                        <a href="{{ route('promotions.show', $stall_id) }}">
                            <span class="glyphicon glyphicon-remove pull-right"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(array('route'=>'promotions.store','method'=>'POST', 'files'=>true)) !!}

                        {{ csrf_field() }}

                        <div class="form-group col-md-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Promotion Name')) }}
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                {{ Form::textarea('description', null, array('class'=>'form-control','rows'=>3, 'placeholder'=>'Description')) }}
                            </div>
                        </div>

                            <div class="input-group">
                                {{ Form::hidden('stall', $stall_id) }}
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            {{Form::label('startdate','Start Promotion Date:')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                {{ Form::date('startdate', \Carbon\Carbon::now(),array('class'=>'form-control','placeholder'=>'End Date')) }}
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            {{Form::label('enddate','End Promotion Date:')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                {{ Form::date('enddate', \Carbon\Carbon::now(),array('class'=>'form-control','placeholder'=>'End Date')) }}
                            </div>
                        </div>



                        <div class="form-group col-md-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>

                        <div id="success" class="col-sm-1 col-sm-offset-1"> </div>
                        {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection