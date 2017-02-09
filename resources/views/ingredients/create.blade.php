@extends('layouts.ame-master')

@section('content')
    <style>
		.table>thead:first-child>tr:first-child>th{
			text-align: left;
		}
    </style>
	{!! Form::open(array('route'=>'ingredients.store','method'=>'POST', 'files'=>true)) !!}
	{{ csrf_field() }}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading ame-title">
                    Create Ingredient
                    <a href="{{ route('stalls.index') }}">
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </a>
                </div>

                <div class="panel-body">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-coffee"></i></span>
							<select class="form-control" name="Category">
							@foreach($categorys as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
							</select>
						</div>
					</div>	
					
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Ingredient name" required>
                        </div>
                    </div>
					
					<div class="form-group">
						<div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <input type="text" name="price" class="form-control" placeholder="Ingredient price" required>
                        </div>
                    </div>
                </div>

				<div class="panel-heading ame-title">
                    Nutrition Info
                </div>
				
				<div class="panel-body">

					<table class="table col-lg-4 col-xs-12">
						<thead>
						<th>Nutrition</th>
						<th>Amount Per Serving</th>

						</thead>
						<tbody>					
							<tr>
								<td>Calories</td>
								<td><input type="text" name="Calories" class="form-control" placeholder="0" required></td>
							</tr>	
							<tr>
								<td>Carbohydrate</td>
								<td><input type="text" name="Carbohydrate" class="form-control" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Saturate Fat</td>
								<td><input type="text" name="Saturate" class="form-control" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Trans Fat</td>
								<td><input type="text" name="Trans" class="form-control" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Fibre</td>
								<td><input type="text" name="Fibre" class="form-control" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Sugar</td>
								<td><input type="text" name="Sugar" class="form-control" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Protein</td>
								<td><input type="text" name="Protein" class="form-control" placeholder="0" required></td>
							</tr>						
						</tbody>
					</table>
					<div id="success"> </div>
					{!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                </div>
            </div>
        </div>
    </div>

	{!! Form::close() !!}
@endsection