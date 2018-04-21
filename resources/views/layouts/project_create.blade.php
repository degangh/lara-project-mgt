<div class="create-project" title="Create a New Project" style="display:none">
    
            
            <form action="{{ url('/projects') }}" method="post">
            {{csrf_field()}}
            
                <div class="form-group">
                    <lable for="project-name" class="control-label">Project Name</label>

                    <div class="">
                        <input type="text" name = "name" id="project-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <lable for="project-name" class="control-label">Project Name</label>

                    <div class="">
                        <textarea name = "desc" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <button class="btn btn-default">
                        <i class="glyphicon glyphicon-plus-sign"></i> Save
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
    jQuery(".create-project").dialog({
        autoOpen: false,
        width: "500px"
    });

    jQuery(".create-project-btn").on("click", function(){
        jQuery(".create-project").dialog("open")
    })
})
</script>