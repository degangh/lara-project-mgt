<div class="create-project" title="@lang('project.new_project')" style="display:none">
    
            
            <form action="{{ url('/projects') }}" method="post" name="create-project-form">
            {{csrf_field()}}
            
                <div class="form-group">
                    <lable for="project-name" class="control-label">@lang('project.name')</label>

                    <div class="">
                        <input type="text" name = "name" id="project-name" class="form-control required">
                    </div>
                </div>

                <div class="form-group">
                    <lable for="project-name" class="control-label">@lang('project.description')</label>

                    <div class="">
                        <textarea name = "desc" class="form-control required" rows="3"></textarea>
                    </div>
                </div>
            </form>
                <div class="form-group">
                    <div class="">
                        <button class="btn btn-primary new-project-btn">
                        <i class="fa fa-save"></i> @lang('project.save')
                        </button>
                    </div>
                </div>
        
  
</div>
<div class="row" style="margin-bottom:15px">
    <div class="col-md-12 pt-2">
        <button class="btn btn-sm create-project-btn btn-success pull-right pt-1 pb-1" >
        <i class="fa fa-plus"></i> @lang('project.new_project')
        </button>
    </div>
</div>

<script>
$(function(){

    var form = $("[name='create-project-form']");

    $(".create-project").dialog({
        autoOpen: false,
        mondal: true,
        width: "auto",
        show: {
            effect: "fade",
            duration: 800
        },

        hide: {
            effect: "fade",
            duration: 800
        },
        position: {my: "center", at: "center", of: window}
    });

    $(".create-project-btn").on("click", function(){
        $(".create-project").dialog("open")
    })

    $(".new-project-btn").on("click", function(e){
        e.preventDefault();
        
        console.log("submit clicked");
        if (validateForm(form.find("input, textarea")))
        {
            form.submit();
        }
    })
  

    /*
       var: inputs: $ collections, include input textarea select etc...
    */
    function validateForm(inputs)
    {
        var flag = true;
        
        inputs.each(function(){
            if ($(this).hasClass("required") && $(this).val() == "")
            {
                $(this).parent().addClass("has-error");
                flag = false;
            }
        })

        return flag;
    }
})
</script>