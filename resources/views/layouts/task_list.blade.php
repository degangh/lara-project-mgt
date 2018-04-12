<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Tasks in {{$project->name}}</div>
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