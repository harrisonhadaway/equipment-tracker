@extends('layouts.app')
@section('content')
@include('layouts.newform')
@include('layouts.newrecord')
@include('layouts.editform')
@include('layouts.files')
<div class="modal" id="bigpic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="image">
    <img id="myImg" src="{{ $equipment->imageurl }}" onerror="this.src='../img/placeholder.jpg'"  style="border: solid; width:100%; height:auto;"> 
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading col-sm-12">
          <h6>Last updated {{ $last_update->created_at->diffForHumans() }}</h6>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6" style="padding: 25px;">
              <a data-toggle="modal" data-target="#bigpic"><img class="img-responsive center-block" src="{{ $equipment->imageurl }}" onerror="this.src='../img/placeholder.jpg'" style="max-width: 100%; max-height: 250px; overflow: hidden;"></a>
            </div> 
            <div class="col-sm-6 col-xs-offset-0" style="padding-top: 0;">
              <h2>{{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }}</h2>
              <ul class="list-unstyled">
                <li><strong>Purchase date:</strong> {{ $equipment->purchase_date }}</li>
                <li><strong>Purchase from:</strong> {{ $equipment->purchase_from }}</li>
                <li><strong>Purchase price:</strong> ${{ number_format($equipment->purchase_price) }}</li>
                <li><strong>{{ $equipment->hours_or_miles }} at purchase:</strong> {{ number_format($equipment->purchase_usage) }}</li>
                <li><strong>Maintenance Cost:</strong> ${{ number_format($total_cost) }}</li>
                <li><strong>S/N:</strong> {{ $equipment->serial_number }}</li>
                <li><strong>VIN:</strong> {{ $equipment->vin_number }}</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="btn-tool-bar btn-group-vertical col-xs-12 col-sm-offset-0" role="toolbar" aria-label="...">
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addrecord">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Service Record</button>
              </div>
              <div class="btn-group" role="group">
                <button href="#editform" type="button" class="btn btn-default" data-toggle="modal" data-target="#editform"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Info</button>
              </div>
              <div class="btn-group" role="group">
                <button href="#filemodal" type="button" class="btn btn-default" data-toggle="modal" data-target="#filemodal"><span class="glyphicon glyphicon-open-file" aria-hidden="true"></span> Documentation</button></a>
              </div>
              <div class="btn-group" role="group">
                 <button form="star" class="btn btn-default {{ $favorite_class }}"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Favorite</button>
              </div>
            </div>
          </div>
          <form id="star" class="button-form" method="post" action="/profile/{{ $equipment->id }}/favorite">
            {{ csrf_field() }}
            <input type="hidden" name="highlighted" id="highlighted" value="{{ $equipment->highlighted }}">
          </form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Service Description</th>
                  <th class="hidden-xs">Serviced by</th>
                  <th class="hidden-xs">{{ $equipment->hours_or_miles }}</th>
                  <th>Date</th>
                  <th class="hidden-xs">Cost</th>
                </tr>
              </thead>
              <tbody>
                @foreach($maintenance_logs as $maintenance_log)
                  <tr class="media" onclick="$('#{{ $maintenance_log->id }}').modal('show')">
                    <td><strong>{{ $maintenance_log->service_description }}</strong></td>
                    <td class="hidden-xs">{{ $maintenance_log->serviced_by }}</td>
                    <td class="hidden-xs">{{ number_format($maintenance_log->usage_at_service) }}</td>
                    <td>{{ date_format($maintenance_log->created_at,"m/d/Y") }}</td>
                    <td class="hidden-xs">${{ number_format($maintenance_log->service_cost) }}</td>
                  </tr>
                @endforeach         
              </tbody>
            </table>
          </div>
          @foreach($maintenance_logs as $maintenance_log)
            <div class="modal fade" id="{{ $maintenance_log->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ $maintenance_log->service_description }}</h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator" method="POST" action="/profile/{{ $equipment->id }}/update" id="form{{ $maintenance_log->id }}">
                      <input type="hidden" name="_method" value="put" />
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="maintenance_log_id" value="{{ $maintenance_log->id }}">
                      <div class="row">
                        <div class="col-xs-5">Brief Description
                          <input id="service_description" name="service_description" type="text" class="form-control" value="{{ $maintenance_log->service_description }}" required>
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
                      </div>
                              Notes
                      <textarea id="service_notes" name="service_notes" class="form-control" rows="2">{{ $maintenance_log->service_notes }}</textarea>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <form id="deleteRecord{{$maintenance_log->id}}" class="button-form" method="delete" action="/deleteRecord/{{ $maintenance_log->id }}">
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
  </div>
@endsection
