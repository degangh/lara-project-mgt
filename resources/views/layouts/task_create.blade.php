<div class="row create-task" style="display:none">
    <div class="col-md-8 col-md-offset-2">
        
            <form action="{{ url('/tasks') }}" method="post">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="row">
                    <label class="form-group col-md-8">
                        <div>Task</div>

                    
                        <input type="text" name = "name" id="task-name" class="form-control">
                        
                        <input type="hidden" name = "project_id" value = "{{Crypt::encrypt($project->id)}}" >
                    </label>
                    
                    <label class="form-group col-md-4">
                        <div>Due Date</div>

                    
                        <input type="text" name = "due_date" id="due-date" class="form-control">
                        
                    </label>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button class="btn btn-default">
                        <i class="glyphicon glyphicon-plus-sign"></i> Add New Task
                        </button>
                    </div>
                </div>
            </div>
        
    </div>

    
</div>

<div class="row" style="margin-bottom:15px">
    <div class="col-md-8 col-md-offset-2">
        <button class="btn btn-default create-task-btn btn-success pull-right" >
        <i class="glyphicon glyphicon-plus-sign"></i> Add New Task
        </button>
    </div>
</div>

    <script>
jQuery(function(){

    jQuery("#due-date").datepicker({"dateFormat": "yy-mm-dd"});

    jQuery(".create-task").dialog({
        autoOpen: false,
        width: "500px"
    })

    jQuery(".create-task-btn").on("click",function(){
        jQuery(".create-task").dialog("open");
    });

})
</script>