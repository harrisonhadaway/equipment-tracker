@extends('layouts.app')
@extends('layouts.newform')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{url('/list')}}"><button type="button" class="btn btn-primary">List of Equipment</button></a>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newform">Add New Equipment</button>



                    <form method="post" action="/photoupload" id="upload" enctype="multipart/form-data">
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <button form="upload" type="submit" value="save" class="btn btn-primary">Save changes</button>
                    </form>




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

                    <ul class="list-group">
                        
                        @foreach($favorites as $favorite)      
                        <li class="list-group-item">
                            <div class="media" onclick="document.location= 'profile/{{ $favorite->id }}'">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="width:60px" 
                                        src="#" onerror="this.src='../img/placeholder.jpg'" >
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $favorite->year }} {{ $favorite->make }} {{ $favorite->model }}</h4>
                                    Last updated {{ $favorite->last_update->diffForHumans() }}
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




