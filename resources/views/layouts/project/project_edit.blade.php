<div class="edit-project row" style="display:none">
    <div class="col-md-12">
    <form method="post" id="edit-project-form">
            {{csrf_field()}}
            {{ method_field('PUT') }}


                <div class="form-group">
                    <lable for="project-name" class="control-label">Project Name</label>

                    <div class="">
                        <input type="text" name = "name" value = ""id="project-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <lable for="project-name" class="control-label">Project Desciption</label>

                    <div class="">
                        <textarea name = "desc" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <button class="btn btn-defalut save-project-btn">
                        <i class="fa fa-save"></i> Save Project
                        </button>
                    </div>
                </div>

            </form>
        </div>
</div>
<script>
jQuery(function(){
    var ctrl = jQuery(".edit-project");
    
    ctrl.dialog({
        autoOpen:false,
        width:"500px",
        show: {
            effect: "fade",
            duration: 800
        },

        hide: {
            effect: "fade",
            duration: 800
        }
    });

    jQuery(".edit-project-btn").on("click", function(){
        ctrl.dialog("open");
        ctrl.find("[name='name']").val(jQuery(this).data("project-name"));
        ctrl.find("[name='desc']").val(jQuery(this).data("desc"));
        $('#edit-project-form').attr('action', "{{url('/projects')}}/" + jQuery(this).data("id"))
    });

    jQuery(".save-project-btn").on("click", function(e){
        $('#edit-project-form').submit();
    })
})

</script>