@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('/home')}}"><button type="button" class="btn btn-primary btn-md active">Home</button></a>
                </div>
                             
        <!-- Make the view switchable between list or grid -->
                    <ul class="list-group">
                        @foreach ($equipment as $machine) 
                            <li class="list-group-item">   
                            <div class="media" onclick="document.location= 'profile/{{ $machine->id }}'">
                                
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="width:60px" src="{{ $machine->imageurl }}" onerror="this.src='../img/placeholder.jpg'" >
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $machine->year }} {{ $machine->make }} {{ $machine->model }}</h4>
                                    Last updated {{ $machine->last_update->diffForHumans() }}
                                </div>
                                <div class="media-right">
                                    <button>
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            </li>                            
                            @endforeach
                        </ul>
                        
                    </div> 
                </div>
            </div>
        </div>
@endsection



