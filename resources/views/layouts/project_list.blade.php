<div class="row">
    <div class="offset-md-1 col-md-10">
        <div class="card">
            <div class="card-header">Project List</div>
            <div class="card-body">
            <table class="table table-striped">
                @foreach ($projects as $project)
                <tr>
                <td>
                {{$project->name}}
                @if ($project->user->id != Auth::user()->id)
                <span class="fa fa-users"></span>
                @endif
                </td>
                <td>
                <a href="{{url('/projects')}}/{{$project->id}}" ><i class="fa fa-folder-open"></i></a>
                </td>
                <td>
                @if ($project->user->id == Auth::user()->id)
                <a href="#" class="edit-project-btn" data-project-name="{{$project->name}}" data-desc="{{$project->desc}}" data-id = "{{$project->id}}"><i class="fa fa-edit"></i></a>
                @else
                <span class="fa fa-lock"></span>
                @endif
                </td>
                </tr>
                @endforeach
                </div>
            </table>
            </div>
        </div>
    </div>
</div>