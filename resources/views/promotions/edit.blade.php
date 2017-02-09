@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Promotion
                </div>

                <div class="panel-body">
                    {!! Form::model($stall, ['route' => ['promotions.update', $stall->id], 'method' => 'PUT', 'files'=>true]) !!}
                    <div class="form-group col-md-12 col-xs-12">
                        {{Form::label('name','Promotion Name:')}}

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Promotion Name']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-xs-12">
                        {{Form::label('price','Price:')}}

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            {{ Form::number('price', null, array('class'=>'form-control', 'placeholder'=>'Price', 'step'=>'any')) }}
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-xs-12">
                        {{Form::label('description','Description:')}}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            {{ Form::textarea('description', null, array('class'=>'form-control','rows'=>3, 'placeholder'=>'Description')) }}
                        </div>
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
                        {{Form::label('currentimg','Change Image:')}}
                        <div class="img-responsive"><br/><img src="{{asset('images/' . $stall->image->url)}} " height="100" width="100"/></div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa fa-camera-retro"></i></span>

                            <input type="file" name="image" class="form-control">

                        </div>
                    </div>


                    <div id="success"> </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('promotions.show', 'Cancel', array($stall->id), array('class' => 'btn btn-danger btn-block')) !!}
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