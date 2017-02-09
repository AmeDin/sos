@extends('layouts.ame-master')

@section('content')
    <style>
        .titleAbsolute{
            position: absolute;
        }
		.table>thead:first-child>tr:first-child>th{
			text-align: left;
		}
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Ingredients</h2>
                    </div>
        <div class="panel-body">
			
            @include('partials._message')
			
            <table class="table col-lg-4 col-xs-12">
                <thead>
                <th>#</th>
                <th>Ingredients Name</th>
				<th>Ingredients Price</th>
                <th>Edit</th>
                <th>Delete</th>

                </thead>
                <tbody>		
					{!! Form::open(array('route' => ['ingredients.receive'],'method' => 'POST')) !!}			
					<div class="form-group col-lg-4 col-md-8 col-xs-12 pull-left">
						<div class="input-group">			
							<span class="input-group-addon">Category</span>
							<select class="form-control" id="Category" name="Category" value="{{ $id }}">
								<option value="0">All</option>
							@foreach($categories as $category)
								 <option value="{{ $category->id }}" <?=$id == $category->id ? ' selected="selected"' : '';?> >{{ $category->name }}</option>
							@endforeach
							</select>
						</div>
					</div>					
					{!! Form::submit('Search', array('class'=>'btn-danger pull-left')) !!}			
					{!! Form::close() !!}
                    <button class="btn-success pull-right" onclick="location.href='{{ route('ingredients.create') }}'"> Add Ingredients </button>
                    @foreach($ingredients as $ingredient)
						<tr>
							<td>{{ $ingredient->id }}</td>
							<td>{{ $ingredient->name }}</td>
							<td>{{ $ingredient->price }}</td>
							<td>
								<button class="btn-success" onclick="location.href='{{ route('ingredients.edit', $ingredient->id) }}'"> Edit </button>
							</td>
							<td>
								{!! Form::open(array('route' => ['ingredients.destroy', $ingredient->id,],'method' => 'DELETE')) !!}
								{!! Form::submit('Delete', array('class'=>'btn-danger', 'onclick'=>'javascript: return confirm(\'Are you sure to delete?\');')) !!}
								{!! Form::close() !!}
							</td>

						</tr>
					@endforeach					
                </tbody>
            </table>

    </div>
                </div>
            </div>
        </div>
    </div>


@endsection