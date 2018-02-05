@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">My Projects</div>
                @foreach ($projects as $project)
                <div class="panel-body">
                {{$project->name}}
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
