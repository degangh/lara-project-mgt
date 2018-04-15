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
                <a href="{{url('/projects')}}/{{$project->id}}" class="btn btn-default"><i class="glyphicon glyphicon-folder-open"></i></a>
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