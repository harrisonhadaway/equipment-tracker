@extends('layouts.app')
@extends('layouts.newform')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{url('/list')}}"><button type="button" class="btn btn-default">List of Equipment</button></a>
                    
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newform">Add New Equipment</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
