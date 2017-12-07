@extends('layouts.app')
@section('content')
@include('layouts.newform')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Equipment <span class="badge">{{ $total }}</span>
                </div>
                <ul class="list-group">
                    @forelse ($equipment as $machine) 
                        <li class="list-group-item">   
                            <div class="media" onclick="document.location= 'profile/{{ $machine->id }}'">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" style="width:60px" src="{{ $machine->imageurl }}" onerror="this.src='../img/placeholder.jpg'" ></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $machine->year }} {{ $machine->make }} {{ $machine->model }}</h4>
                                    Last updated {{ $machine->last_update->diffForHumans() }}
                                </div>
                            </div>
                        </li> 
                    @empty
                        <li class="list-group-item">   
                            <div class="media" >
                                <div class="media-left">
                                    <a href="#"><img class="media-object" style="width:60px" src="#" onerror="this.src='../img/placeholder.jpg'" ></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">All of your equipment will live here. <br>Start adding equipment to get started with Equipment Tracker.</h4>
                                    Last updated 10 minutes ago.
                                </div>
                            
                            </div>
                        </li> 
                    @endforelse
                </ul>
            </div> 
        </div>
    </div>
</div>
@endsection



