<div class="row create-task" style="display:none">

        
            <form action="{{ url('/tasks') }}" method="post" name="create-task-form">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="row">
                    <label class="form-group col-md-8">
                        <div>Task</div>

                    
                        <input type="text" name = "name" id="task-name" class="form-control required">
                        
                        <input type="hidden" name = "project_id" value = "{{Crypt::encrypt($project->id)}}" >
                    </label>
                    
                    <label class="form-group col-md-4">
                        <div>Due Date</div>

                    
                        <input type="text" name = "due_date" id="due-date" readonly class="form-control required">
                        
                    </label>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button class="btn btn-default save-task-btn">
                        <i class="glyphicon glyphicon-plus-sign"></i> Save Task
                        </button>
                    </div>
                </div>
            </div>
        


    </form>
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

    var form_error = [];
    var form = jQuery("[name='create-task-form']");

    form.find("input").on("change",function(){
        jQuery(this).parent().removeClass("has-error");
    })

    jQuery("#due-date").datepicker({"dateFormat": "yy-mm-dd"});

    jQuery(".create-task").dialog({
        autoOpen: false,
        width: "500px",
        show: {
            effect: "fade",
            duration: 800
        },

        hide: {
            effect: "fade",
            duration: 800
        }
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