@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Equipment Registration</div>
                <div class="panel-body">
                      <form method="post" action="/equipment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="make">Make</label>
                            <input class="form-control" id="make" name="make" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="model">Model</label>
                            <input class="form-control" id="model" name="model" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="year">Year</label>
                            <input class="form-control" id="year" name="year" type="text">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="purchase_from">Purchase From:</label>
                            <input class="form-control" id="purchase_from" name="purchase_from" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_date">Purchase Date:</label>
                            <input class="form-control" id="purchase_date" name="purchase_date" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_price">Purchase Price:</label>
                            <input class="form-control" id="purchase_price" name="purchase_price" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="purchase_miles">Miles at purchase:</label>
                            <input class="form-control" id="purchase_miles" name="purchase_miles" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_hours">Hours at purchase:</label>
                            <input class="form-control" id="purchase_hours" name="purchase_hours" type="text">
                          </div>
                        </div>      
                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="serial_number">Serial Number:</label>
                            <input class="form-control" id="serial_number" name="serial_number" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="vin_number">VIN Number:</label>
                            <input class="form-control" id="vin_number" name="vin_number" type="text">
                          </div>
                        </div>                

                        <button type="submit" value="save" class="btn btn-default">Save</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
