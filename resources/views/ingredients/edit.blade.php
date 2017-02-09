@extends('layouts.ame-master')

@section('content')
    <style>
		.table>thead:first-child>tr:first-child>th{
			text-align: left;
		}
    </style>
	{!! Form::model($ingredients, ['route' => ['ingredients.update', $ingredients->id], 'method' => 'PUT', 'files'=>true]) !!}
	
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Ingredient
                </div>

                <div class="panel-body">
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-coffee"></i></span>
							<select class="form-control" id="Category" name="Category">
								<option value="0">All</option>
							@foreach($categories as $category)
								 <option value="{{ $category->id }}" <?=$ingredients->category_id == $category->id ? ' selected="selected"' : '';?> >{{ $category->name }}</option>
							@endforeach
							</select>
						</div>
					</div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingredient name', ]) !!}
                        </div>
                    </div>
					<div class="form-group">
						<div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Ingredient price', ]) !!}
                        </div>
                    </div>
                </div>
				<div class="panel-heading">
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
								<td><input type="text" name="Calories" class="form-control" value="{{ $nutrition->calories }}" placeholder="0" required></td>
							</tr>	
							<tr>
								<td>Carbohydrate</td>
								<td><input type="text" name="Carbohydrate" class="form-control" value="{{ $nutrition->carbohydrate }}" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Saturate Fat</td>
								<td><input type="text" name="Saturate" class="form-control" value="{{ $nutrition->saturate_fat }}" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Trans Fat</td>
								<td><input type="text" name="Trans" class="form-control" value="{{ $nutrition->trans_fat }}" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Fibre</td>
								<td><input type="text" name="Fibre" class="form-control" value="{{ $nutrition->fibre }}" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Sugar</td>
								<td><input type="text" name="Sugar" class="form-control" value="{{ $nutrition->sugar }}" placeholder="0" required></td>
							</tr>
							<tr>
								<td>Protein</td>
								<td><input type="text" name="Protein" class="form-control" value="{{ $nutrition->protein }}" placeholder="0" required></td>
							</tr>						
						</tbody>
					</table>
                    <div id="success"> </div>
                    <div class="row">
                        <div class="col-sm-6">
							<a href="{{ route('ingredients.index') }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save updates', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	{!! Form::close() !!}
@endsection