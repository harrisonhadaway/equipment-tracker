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
                        <h1>{{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }} <br>
                            <small>Last updated on 5-6-90 --TODO</small></h1>  
                    </div>
                    <div class="col-md-4 ">
                        <strong>Purchase date:</strong> {{ $equipment->purchase_date }} <br>
                        <strong>Purchase from:</strong> {{ $equipment->purchase_from }} <br>
                        <strong>Hours at purchase:</strong> {{$equipment->purchase_hours }}
                    </div>
                    <div class="col-md-4">
                        <strong>Maintance Cost:</strong> TODO <br>
                        <strong>S/N:</strong> {{ $equipment->serial_number }} <br>
                        <strong>VIN:</strong> {{ $equipment->vin_number }}
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Service Description <br> Serviced by:</th>
                        <th>Hours</th>
                        <th>Date</th>
                        <th>Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($maintenance_logs as $maintenance_log)
                      <tr>
                        <td>{{ $maintenance_log->service_description }} <br> {{ $maintenance_log->serviced_by }}</td>
                        <td>{{ $maintenance_log->hours_at_service }}</td>
                        <td>{{ $maintenance_log->created_at }}</td>
                        <td>{{ $maintenance_log->service_cost }}</td>
                      </tr>  
                      @endforeach         
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
