@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Equipment Profile</div>

                <div class="panel-body">
                    <div class="col-md-4">


                        <img src="#" onerror="this.src='../img/placeholder.jpg'" 
                            style="border: solid; width:200px; height:auto;" >
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }}</h2>
                    </div>
               
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
