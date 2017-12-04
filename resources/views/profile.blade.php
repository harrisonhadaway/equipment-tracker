@extends('layouts.app')
@extends('layouts.newrecord')
@extends('layouts.editform')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading col-sm-12">
                    <div class="col-md-4">
                        <a href="{{url('/home')}}"><button type="button" class="btn btn-primary btn-md active">Home</button></a>
                        <a href="{{url('/list')}}" class="btn btn-primary btn-md active" role="button">Equipment List</a>
                    </div>
                    <div class="col-md-2">
                        <form class="button-form" method="post" action="/profile/{{ $equipment->id }}/favorite">
                            {{ csrf_field() }}

                            <input type="hidden" name="highlighted" id="highlighted" value="{{ $equipment->highlighted }}">
                            <button class="btn btn-default btn-md {{ $favorite_class }}"><strong>&#9734;</strong></button>
                        </form>
                    </div>
                </div>
                
                <div class="panel-body">
                    <div class="col-md-4" style="padding: 25px;">
                       <!--  <img src="{{ $equipment->imageurl }}" onerror="this.src='../img/placeholder.jpg'" 
                            style="border: solid; width:220px; height:auto;" > -->
                            <!-- Trigger the Modal -->
                            <img id="myImg" src="{{ $equipment->imageurl }}" onerror="this.src='../img/placeholder.jpg'"  style="border: solid; width:220px; height:auto;">

                            <div class="modal fade" id="{{ $equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                              </div>
                              <div class="modal-body">

                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button form="" type="submit" value="save" class="btn btn-primary">Save changes</button>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-8">
                        <h1>{{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }}</h1>
                       
                        <h6>Last updated {{ $last_update->created_at->diffForHumans() }}</h6>
                      
                    </div>
                    <div class="col-md-4 ">
                        <strong>Purchase date:</strong> {{ $equipment->purchase_date }} <br>
                        <strong>Purchase from:</strong> {{ $equipment->purchase_from }} <br>
                        <strong>{{ $equipment->hours_or_miles }} at purchase:</strong> {{ number_format($equipment->purchase_usage) }}
                    </div>
                    <div class="col-md-4">
                        <strong>Maintenance Cost:</strong> ${{ number_format($total_cost) }} <br>
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
                        <th>{{ $equipment->hours_or_miles }}</th>
                        <th>Date</th>
                        <th>Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($maintenance_logs as $maintenance_log)
                      <tr class="media" onclick="$('#{{ $maintenance_log->id }}').modal('show')">
                            <td><strong>{{ $maintenance_log->service_description }}</strong></td>
                            <td>{{ $maintenance_log->serviced_by }}</td>
                            <td>{{ number_format($maintenance_log->usage_at_service) }}</td>
                            <td>{{ date_format($maintenance_log->created_at,"m/d/Y") }}</td>
                            <td>${{ number_format($maintenance_log->service_cost) }}</td>
                        </tr>
                        
                        
                      @endforeach         
                    </tbody>
                </table>

                @foreach($maintenance_logs as $maintenance_log)

                <div class="modal fade" id="{{ $maintenance_log->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ $maintenance_log->service_description }}</h4>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="/profile/{{ $equipment->id }}/update" id="form{{ $maintenance_log->id }}">
                                    <input type="hidden" name="_method" value="put" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="maintenance_log_id" value="{{ $maintenance_log->id }}">
                                      <div class="row">
                                        <div class="col-xs-5">Brief Description
                                          <input id="service_description" name="service_description" type="text" class="form-control" value="{{ $maintenance_log->service_description }}">
                                        </div>
                                        <div class="col-xs-3">{{ $equipment->hours_or_miles }}
                                          <input id="usage_at_service" name="usage_at_service" type="number" step="0.01" min="0" class="form-control" value="{{ $maintenance_log->usage_at_service }}">
                                        </div>
                                        
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-5">Serviced by
                                          <input id="serviced_by" name="serviced_by" type="text" class="form-control" value="{{ $maintenance_log->serviced_by }}">
                                        </div>
                                        <div class="col-xs-3">Cost
                                          <input id="service_cost" name="service_cost" type="number" step="0.01" min="0" class="form-control" value="{{ $maintenance_log->service_cost}}">
                                        </div>
                                      </div>Notes
                                      <textarea id="service_notes" name="service_notes" class="form-control" rows="2">{{ $maintenance_log->service_notes }}</textarea>
                                    </div>
                                    </form>
                                    <div class="modal-footer">
                                      <form id="deleteRecord{{$maintenance_log->id}}" class="button-form" method="delete" 
                                        action="/deleteRecord/{{ $maintenance_log->id }}">
                                      </form>
                                      <button form="deleteRecord{{ $maintenance_log->id }}" type="submit" class="btn btn-danger pull-left">DELETE</button>

                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button form="form{{ $maintenance_log->id }}" type="submit" value="save" class="btn btn-primary">Save changes</button>
                                    </div>
                                
                            </div>
                          </div>
                        </div>

                @endforeach 
            </div>
        </div>
    </div>
</div>
@endsection
