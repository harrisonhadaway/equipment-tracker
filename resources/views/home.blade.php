@extends('layouts.app')
@extends('layouts.newform')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <a href="{{url('/list')}}"><button type="button" class="btn btn-primary">List of Equipment</button></a>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newform">Add New Equipment</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Favorite Equipment</div>

                    <!-- <ul class="list-group">
                        
                        @foreach($favorites as $favorite)      
                        <li class="list-group-item">
                            <div class="media" onclick="document.location= 'profile/{{ $favorite->id }}'">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="width:60px" 
                                        src="{{ $favorite->imageurl }}" onerror="this.src='../img/placeholder.jpg'" >
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $favorite->year }} {{ $favorite->make }} {{ $favorite->model }}</h4>
                                    Last updated {{ $favorite->last_update->diffForHumans() }}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul> -->
                    <div class="row">
                    @forelse($favorites as $favorite)    
                    
                      <div class="col-sm-6 col-md-6">

                        <div class="thumbnail hover" onclick="document.location= 'profile/{{ $favorite->id }}'">
                          <img style="height: 250px; width: auto;"  src="{{ $favorite->imageurl }}" onerror="this.src='../img/placeholder.jpg'">
                          <div class="caption">
                            <h4>{{ $favorite->year }} {{ $favorite->make }} {{ $favorite->model }}</h4>
                            <p>Last updated {{ $favorite->last_update->diffForHumans() }}</p>
                            <!-- <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p> -->
                          </div>
                        </div>
                      </div>

                    @empty
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Your favorite pieces of equipnent go here! Making your life easy is what Equipment Tracker does for you!!</h4>
                   
                    @endforelse
                     </div>



            </div>
        </div>
    </div>
</div>
@endsection




