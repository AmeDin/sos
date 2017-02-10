@extends('layouts.ame-master')

@section('content')

    <div class="panel col-md-6 bg-grey-white">
        <div class="panel-heading">
            <h5>Guidelines</h5>
        </div>
        <div class="panel panel-body text-center">
            <div class="rows pull-left">
                Portion size is depending on each food itself. Refer to table below:

                <table class="table col-lg-12">

                    <thead>
                    <tr class="bg-info">
                        <th>Name</th>
                        <th>Portion:1</th>
                        <th>Portion:2</th>
                        <th>Portion:3</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Rice</th>
                        <th>20gm</th>
                        <th>50gm</th>
                        <th>100gm</th>

                    </tr>
                    <tr>
                        <th>Beef</th>
                        <th>50gm</th>
                        <th>70gm</th>
                        <th>90gm</th>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>Customize</h2>
                </div>
                <div class="panel panel-body text-center">
                    {{ Form::open(array('route' => 'customizeOrders.store', 'method' => 'post'))   }}

                    <div class="rows">
                        <h1 class="list-group-item list-group-item-danger">Staple</h1>
                        <div class="panel-body pad-top-five">
                            @include('partials._message')


                            <table class="table col-lg-12">
                                @if($staple->count() > 0)
                                    <thead>
                                    <tr class="bg-danger">
                                        <th>Name</th>
                                        <th>Nutrients</th>
                                        <th>Portion</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($staple as $indexKey => $ingredient)

                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td><div class="glyphicon glyphicon-info-sign"></div></td>
                                            <td>{{Form::selectRange('portion['.$ingredient->id.']', 1, 3)}}</td>
                                            <td>{{ $ingredient->price }}</td>
                                            <td> {{ Form::checkbox('ingredient['.$ingredient->id.']', $ingredient->id) }}</td>
                                        </tr>
                                        <div class="hidden">{{ $indexKey++ }}</div>

                                    @endforeach

                                    @else
                                        <h1>No Ingredients For This Category</h1>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="rows">
                        <h1 class="list-group-item list-group-item-info">Meat</h1>
                        <div class="panel-body pad-top-five">
                            @include('partials._message')


                            <table class="table col-lg-12">
                                @if($meat->count() > 0)
                                    <thead>
                                    <tr class="bg-info">
                                        <th>Name</th>
                                        <th>Nutrients</th>
                                        <th>Portion</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($meat as $indexKey => $ingredient)

                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td><div class="glyphicon glyphicon-info-sign"></div></td>
                                            <td>{{Form::selectRange('portion['.$ingredient->id.']', 1, 3)}}</td>
                                            <td>{{ $ingredient->price }}</td>
                                            <td> {{ Form::checkbox('ingredient['.$ingredient->id.']', $ingredient->id) }}</td>
                                        </tr>
                                        <div class="hidden">{{ $indexKey++ }}</div>

                                    @endforeach

                                    @else
                                        <h1>No Ingredients For This Category</h1>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="rows">
                        <h1 class="list-group-item list-group-item-success">Vegetables</h1>
                        <div class="panel-body pad-top-five">
                            @include('partials._message')


                            <table class="table col-lg-12">
                                @if($vegetable->count() > 0)
                                    <thead>
                                    <tr class="bg-success">
                                        <th>Name</th>
                                        <th>Nutrients</th>
                                        <th>Portion</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vegetable as $indexKey => $ingredient)

                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td><div class="glyphicon glyphicon-info-sign"></div></td>
                                            <td>{{Form::selectRange('portion['.$ingredient->id.']', 1, 3)}}</td>
                                            <td>{{ $ingredient->price }}</td>
                                            <td> {{ Form::checkbox('ingredient['.$ingredient->id.']', $ingredient->id) }}</td>
                                        </tr>
                                        <div class="hidden">{{ $indexKey++ }}</div>

                                    @endforeach

                                    @else
                                        <h1>No Ingredients For This Category</h1>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="rows">
                        <h1 class="list-group-item list-group-item-warning">Seafood</h1>
                        <div class="panel-body pad-top-five">
                            @include('partials._message')


                            <table class="table col-lg-12">
                                @if($seafood->count() > 0)

                                    <thead>
                                    <tr class="bg-warning">
                                        <th>Name</th>
                                        <th>Nutrients</th>
                                        <th>Portion</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($seafood as $indexKey => $ingredient)

                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td><div class="glyphicon glyphicon-info-sign"></div></td>
                                            <td>{{Form::selectRange('portion['.$ingredient->id.']', 1, 3)}}</td>
                                            <td>{{ $ingredient->price }}</td>
                                            <td> {{ Form::checkbox('ingredient['.$ingredient->id.']', $ingredient->id) }}</td>
                                        </tr>
                                        <div class="hidden">{{ $indexKey++ }}</div>

                                    @endforeach

                                    @else
                                        <h1>No Ingredients For This Category</h1>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="rows">
                        <h1 class="list-group-item list-group-item-danger">Nuts</h1>
                        <div class="panel-body pad-top-five">
                            @include('partials._message')


                            <table class="table col-lg-12">
                                @if($nut->count() > 0)
                                    <thead>
                                    <tr class="bg-danger">
                                        <th>Name</th>
                                        <th>Nutrients</th>
                                        <th>Portion</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($nut as $indexKey => $ingredient)

                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td><div class="glyphicon glyphicon-info-sign arrow"></div></td>
                                            <td>{{Form::selectRange('portion['.$ingredient->id.']', 1, 3)}}</td>
                                            <td>{{ $ingredient->price }}</td>
                                            <td> {{ Form::checkbox('ingredient['.$ingredient->id.']', $ingredient->id) }}</td>
                                        </tr>
                                        <div class="hidden">{{ $indexKey++ }}</div>

                                    @endforeach

                                    @else
                                        <h1>No Ingredients For This Category</h1>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="rows">
                        <h1 class="list-group-item list-group-item-info">Sauce</h1>
                        <div class="panel-body pad-top-five">
                            @include('partials._message')


                            <table class="table col-lg-12">
                                @if($sauce->count() > 0)
                                    <thead>
                                    <tr class="bg-info">
                                        <th>Name</th>
                                        <th>Nutrients</th>
                                        <th>Portion</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($sauce as $indexKey => $ingredient)

                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td><div class="glyphicon glyphicon-info-sign arrow"></div></td>
                                            <td>{{Form::selectRange('portion['.$ingredient->id.']', 1, 3)}}</td>
                                            <td>{{ $ingredient->price }}</td>
                                            <td> {{ Form::checkbox('ingredient['.$ingredient->id.']', $ingredient->id) }}</td>
                                        </tr>
                                        <div class="hidden">{{ $indexKey++ }}</div>

                                    @endforeach

                                    @else
                                        <h1>No Ingredients For This Category</h1>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>



                    {{-------------BUTTONS--------}}
                    <div class="col-sm-6">
                        <a href="javascript:history.back()" class="btn btn-danger btn-block">Back</a>
                    </div>
                    <div class="col-sm-6">
                        {{Form::hidden('stall_id',$stalls->id)}}

                        {{ Form::submit('Pay Now', ['class' => 'btn btn-success btn-block']) }}
                    </div>

                </div>


            </div>

        </div>
    </div>

    <div >

    </div>
@endsection