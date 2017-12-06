@extends('layouts.app')
@extends('layouts.newform')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <h4>Total maintenance cost ${{ number_format($maintenance_cost) }}.</h4>
                    <h4>Purchase price total of all equipment ${{ number_format($purchase_total) }}.</h4><br>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Favorite Equipment 
                </div>
                <ul class="list-group">
                    @forelse($favorites as $favorite)      
                    <li class="list-group-item">
                        <div class="media" onclick="document.location= 'profile/{{ $favorite->id }}'">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" style="width:100px" 
                                    src="{{ $favorite->imageurl }}" onerror="this.src='../img/placeholder.jpg'" >
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $favorite->year }} {{ $favorite->make }} {{ $favorite->model }}</h4>
                                Last updated {{ $favorite->last_update->diffForHumans() }}
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">
                        <div class="media" onclick="document.location= '#'">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" style="width:100px" 
                                    src="#" onerror="this.src='../img/placeholder.jpg'" >
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Favorited Equipment shows up here in a list.</h4>
                                Making it easy to access records on the go!
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




