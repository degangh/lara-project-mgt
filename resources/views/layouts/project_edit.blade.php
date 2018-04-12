<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Project</div>
            <form action="{{url('/projects')}}/{{$current_project->id}}" method="post">
            {{csrf_field()}}
            {{ method_field('PUT') }}

            <div class="panel-body">
                <div class="form-group">
                    <lable for="project-name" class="control-label">Project</label>

                    <div class="">
                        <input type="text" name = "name" value = "{{$current_project->name}}"id="project-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <button class="btn btn-default">
                        <i class="fa fa-plus"></i>Save Project
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>