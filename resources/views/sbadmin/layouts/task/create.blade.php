<div class="row create-task col-md-8 col-sm-12" title="@lang('task.create')" style="display:none">

        <div class="col-md-12">
            <form action="{{ url('/tasks') }}" method="post" name="create-task-form">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="row">
                    <label class="form-group col-md-12">
                        <div>@lang('task.task')</div>

                    
                        <input type="text" name = "name" id="task-name" class="form-control form-control-sm required input-small">
                        
                        <input type="hidden" name = "project_id" value = "{{Crypt::encrypt($project->id)}}" >
                    </label>

                    <label class="form-group col-md-12">
                        <div>@lang('task.assign_to')</div>
            <select name = "assignee" id="assignee-select" class="form-control form-control-sm">
            @foreach ($users as $user)
                <option value="{{$user->id}}" >{{$user->name}}</option>
            @endforeach
            </select>
            </label>
                    
                    <label class="form-group col-md-12">
                        <div>@lang('task.due_date')</div>

                    
                        <input type="text" name = "due_date" id="due-date" readonly class="form-control form-control-sm required">
                        
                    </label>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button class="btn btn-primary btn-sm save-task-btn">
                        <i class="fa fasave"></i> @lang('task.save')
                        </button>
                    </div>
                </div>
            </div>
        


    </form>
    </div>
</div>

<div class="row" style="margin-bottom:15px;">
    <div class="col-md-12 mt-2">
        <button class="btn btn-xs add-member-btn btn-success" >
        <i class="fa fa-user-plus"></i> 
        <span class='d-none d-md-inline'>@lang('project.add_member')</span>
        </button> 
        
        <button class="btn btn-xs create-task-btn btn-success" >
        <i class="fas fa-tasks"></i> <span class='d-none d-md-inline'>@lang('project.add_task')</span>
        </button>

        <button class="btn btn-xs upload-btn btn-success" >
        <i class="fas fa-file-upload"></i> <span class='d-none d-md-inline'>@lang('project.add_file')</span>
        </button>
    </div>
</div>

    <script>
jQuery(function(){

    var form_error = [];
    var form = jQuery("[name='create-task-form']");

    jQuery("#assignee-select").select2({
        theme: "classic",
        width: "resolve"
    });

    form.find("input").on("change",function(){
        jQuery(this).parent().removeClass("has-error");
    })

    jQuery("#due-date").datepicker({"dateFormat": "yy-mm-dd"});

    jQuery(".create-task").dialog({
        autoOpen: false,
        modal: true,
        width: 'auto',
        maxWidth: "500px",
        show: {
            effect: "fade",
            duration: 800
        },

        hide: {
            effect: "fade",
            duration: 800
        }, 
        fluid: true
    })

    jQuery(".create-task-btn").on("click",function(){
        jQuery(".create-task").dialog("open");
    });

    jQuery(".save-task-btn").on("click", function(e){
        e.preventDefault();
        
        console.log("submit clicked");
        if (validateForm(form.find("input")))
        {
            form.submit();
        }
    })

    /*
       var: inputs: jQuery collections, include input textarea select etc...
    */
    function validateForm(inputs)
    {
        var flag = true;
        
        inputs.each(function(){
            if (jQuery(this).hasClass("required") && jQuery(this).val() == "")
            {
                jQuery(this).parent().addClass("has-error");
                flag = false;
            }
        })

        return flag;
    }


})
</script>