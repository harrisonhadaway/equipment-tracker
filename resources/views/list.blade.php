@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Equipment:</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Make the view switchable between list or grid -->

                    <ul class="list-group">
                        @foreach ($equipment as $equipment)
                        <li class="list-group-item">

                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" style="width:60px" src="..." alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading">{{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }}</h4>
                            Last updated hours:!!Pull from maintenance records!!
                          </div>
                        </div>
                        </li>

                        @endforeach
                    </ul>

                </div> 
            </div>
        </div>
    </div>
</div>


@endsection