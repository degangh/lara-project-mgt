<div class="row">
    <div class="offset-md-1 col-md-10">
            <table class="table table-striped">
                @foreach ($projects as $project)
                <tr>
                <td>
                {{$project->name}}
                </td>
                <td>
                <a href="{{url('/projects')}}/{{$project->id}}" ><i class="fa fa-folder-open"></i></a>
                </td>
                <td>
                <a href="#" class="edit-project-btn" data-project-name="{{$project->name}}" data-desc="{{$project->desc}}" data-id = "{{$project->id}}"><i class="fa fa-edit"></i></a>
                </td>
                </tr>
                @endforeach
                </div>
            </table>

    </div>
</div>