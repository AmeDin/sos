@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Vendor
                </div>

                <div class="panel-body">
                    {!! Form::model($vendor, ['route' => ['vendors.update', $vendor->id], 'method' => 'PUT', 'files'=>true]) !!}
                    <div class="form-group col-md-12 col-xs-12">
                        {{Form::label('name',"Vendor's Name:")}}

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Promotion Name']) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-xs-12">
                        {{Form::label('email','Email:')}}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            {{ Form::text('email', null, array('class'=>'form-control','rows'=>3, 'placeholder'=>'Email')) }}
                        </div>
                    </div>

                    <div id="success"> </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('vendors.show', 'Cancel', null, array('class' => 'btn btn-danger btn-block')) !!}
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