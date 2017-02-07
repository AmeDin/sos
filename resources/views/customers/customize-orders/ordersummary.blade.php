@extends('layouts.ame-master')

@section('content')
    <div class="container">
        <div class="row" data-spy="affix" data-offset-top="50">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong>Total Nutrients:</strong></td>
                                    <td class="thick-line text-right">$670.99</td>
                                </tr>

                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Total:</strong></td>
                                    <td class="no-line text-right">$685.99</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        {{-------------BUTTONS--------}}
                        <div class="col-sm-6">
                            <a href="javascript:history.back()" class="btn btn-danger btn-block">Amend Changes</a>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Pay', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>








@endsection