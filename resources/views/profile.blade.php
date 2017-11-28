@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url('/list')}}">List of Equipment</a></div>

                <div class="panel-body">
                    <div class="col-md-4" style="padding: 25px;">
                        <img src="#" onerror="this.src='../img/placeholder.jpg'" 
                            style="border: solid; width:150px; height:auto;" >
                    </div>
                    <div class="col-md-8">
                        <h1>{{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }}</h1>
                        <h4>Last updated on 5-6-90 --TODO</h4>
                    </div>
                    <div class="col-md-4 ">
                        <strong>Purchase date:</strong> {{ $equipment->purchase_date }} <br>
                        <strong>Purchase from:</strong> {{ $equipment->purchase_from }} <br>
                        <strong>Hours at purchase:</strong> {{ $equipment->purchase_hours }}
                    </div>
                    <div class="col-md-4">
                        <strong>Maintance Cost:</strong> TODO <br>
                        <strong>S/N:</strong> {{ $equipment->serial_number }} <br>
                        <strong>VIN:</strong> {{ $equipment->vin_number }}
                    </div>
                </div>

                <div>
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addrecord">Add Maintenance Record</button>
                      </div>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default">Edit Info</button>
                      </div>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default">Export Info</button>
                      </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Service Description</th>
                        <th>Serviced by</th>
                        <th>Hours</th>
                        <th>Date</th>
                        <th>Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($maintenance_logs as $maintenance_log)
                      <tr>
                        <td><strong>{{ $maintenance_log->service_description }}</strong></td>
                        <td>{{ $maintenance_log->serviced_by }}</td>
                        <td>{{ $maintenance_log->hours_at_service }}</td>
                        <td>{{ $maintenance_log->created_at }}</td>
                        <td>${{ $maintenance_log->service_cost }}</td>
                      </tr>  
                      @endforeach         
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="addrecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Maintenance Record</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="/profile/{id}" id="record">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
                              <div class="row">
                                <div class="col-xs-4">Brief Description
                                  <input id="service_description" name="service_description" type="text" class="form-control" placeholder="Oil Change">
                                </div>
                                <div class="col-xs-4">Serviced by
                                  <input id="serviced_by" name="serviced_by" type="text" class="form-control" placeholder="Billy Bob">
                                </div>
                                <div class="col-xs-2">Hours
                                  <input id="hours_at_service" name="hours_at_service" type="text" class="form-control" placeholder="1,234">
                                </div>
                                <div class="col-xs-2">Cost
                                  <input id="service_cost" name="service_cost" type="text" class="form-control" placeholder="1,234">
                                </div>
                              </div>Notes
                              <textarea id="service_notes" name="service_notes" class="form-control" rows="2" placeholder="He did good."></textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button form="record" type="submit" value="save" class="btn btn-primary">Save changes</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
