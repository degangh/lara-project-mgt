@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Add Project</div>
            <form action="{{ url('/projects') }}" method="post">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="form-group">
                    <lable for="project-name" class="control-label">Project</label>

                    <div class="">
                        <input type="text" name = "name" id="project-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <button class="btn btn-default">
                        <i class="fa fa-plus"></i>Add New Project
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">My Projects</div>
            <div class="panel-body">
            <table class="table table-striped">
                @foreach ($projects as $project)
                <tr>
                <td>
                {{$project->name}}
                </td>
                <td>
                <a href="{{url('/projects')}}/{{$project->id}}" class="btn btn-default">View</a>
                </td>
                <td>
                <a href="{{url('/projects')}}/{{$project->id}}/edit" class="btn btn-default">Edit</a>
                </td>
                </tr>
                @endforeach
                </div>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
