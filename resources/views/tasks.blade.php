@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Task</div>
            <form action="{{ url('/task/add') }}" method="post">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="form-group">
                    <lable for="task-name" class="control-label">Task</label>

                    <div class="">
                        <input type="text" name = "name" id="task-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <button class="btn btn-default">
                        <i class="fa fa-plus"></i>Add New Task
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
            <div class="panel-heading">Tasks in {$project->name}</div>
            <div class="panel-body">
            <table class="table table-striped">
                @foreach ($tasks as $task)
                <tr>
                <td>
                {{$task->name}}
                </td>
                <td>
                
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
