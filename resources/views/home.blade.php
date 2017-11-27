@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{url('/list')}}">List of Equipment</a> <br>
                    <a href="{{url('/new')}}">Add new equipment</a>
                </div>
            </div>
        </div>
    </div>
</div>
<example></example>

@endsection
