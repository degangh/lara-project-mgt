<!-- Project List -->
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-project-diagram"></i>
              @lang('project.project_list')</div>
            <div class="card-body">
            <div class="table-responsive">
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
                <a class="btn btn-xs btn-success" href="{{url('/projects')}}/{{$project->id}}" ><i class="far fa-folder-open"></i>  </a>
                
                @if ($project->user->id == Auth::user()->id)
                <button class="edit-project-btn btn btn-info btn-xs" data-project-name="{{$project->name}}" data-desc="{{$project->desc}}" data-id = "{{$project->id}}"><i class="fa fa-edit"></i></button>
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
