@extends('layouts.app')
@extends('layouts.newrecord')
@extends('layouts.editform')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('/list')}}"><button type="button" class="btn btn-default">List of Equipment</button></a>
                </div>
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
                        <strong>Maintenance Cost:</strong> ${{ $total_cost }} <br>
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
                        <button href="#editform" type="button" class="btn btn-default" data-toggle="modal" data-target="#editform">Edit Info</button>
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
                      <tr class="media" onclick="$('#{{ $maintenance_log->id }}').modal('show')">
                            <td><strong>{{ $maintenance_log->service_description }}</strong></td>
                            <td>{{ $maintenance_log->serviced_by }}</td>
                            <td>{{ $maintenance_log->hours_at_service }}</td>
                            <td>{{ $maintenance_log->created_at }}</td>
                            <td>${{ $maintenance_log->service_cost }}</td>
                        </tr>
                        <div class="modal fade" id="{{ $maintenance_log->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title" id="myModalLabel">{{ $maintenance_log->service_description }}</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Service by: {{ $maintenance_log->serviced_by }}</h4>
                                        <h4>Hours at serice: {{ $maintenance_log->hours_at_service }}</h4>
                                        <h4>Work completed on: {{ $maintenance_log->created_at }}</h4>
                                        <h4>Cost of work: ${{ $maintenance_log->service_cost }}</h4>
                                        <p>Notes: {{ $maintenance_log->service_notes }} </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endforeach         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
