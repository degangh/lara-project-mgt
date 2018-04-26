<div class="create-project" title="Create a New Project" style="display:none">
    
            
            <form action="{{ url('/projects') }}" method="post" name="create-project-form">
            {{csrf_field()}}
            
                <div class="form-group">
                    <lable for="project-name" class="control-label">Project Name</label>

                    <div class="">
                        <input type="text" name = "name" id="project-name" class="form-control required">
                    </div>
                </div>

                <div class="form-group">
                    <lable for="project-name" class="control-label">Project Name</label>

                    <div class="">
                        <textarea name = "desc" class="form-control required" rows="3"></textarea>
                    </div>
                </div>
            </form>
                <div class="form-group">
                    <div class="">
                        <button class="btn btn-default new-project-btn">
                        <i class="glyphicon glyphicon-plus-sign"></i> Save Project
                        </button>
                    </div>
                </div>
        
  
</div>
<div class="row" style="margin-bottom:15px">
    <div class="col-md-8 col-md-offset-2">
        <button class="btn btn-default create-project-btn btn-success pull-right" >
        <i class="glyphicon glyphicon-plus-sign"></i> Add New Project
        </button>
    </div>
</div>

<script>
jQuery(function(){

    var form = jQuery("[name='create-project-form']");

    jQuery(".create-project").dialog({
        autoOpen: false,
        width: "500px",
        show: {duration: 800},
        position: {my: "center", at: "center", of: window}
    });

    jQuery(".create-project-btn").on("click", function(){
        jQuery(".create-project").dialog("open")
    })

    jQuery(".new-project-btn").on("click", function(e){
        e.preventDefault();
        
        console.log("submit clicked");
        if (validateForm(form.find("input, textarea")))
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