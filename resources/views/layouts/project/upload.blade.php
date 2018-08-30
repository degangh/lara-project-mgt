<div class="upload-file" title="Upload Project File" style="display:none">
 <form method="post" enctype='multipart/form-data' action="{{ url('/projects/'. $project->id. '/file') }}">
 {{csrf_field()}}   
 <div class="form-group">
 <lable class="control-label">Upload</label>

 <div class="">
     <input type = 'file' name='attchement'>
 </div>
</div>
<div class="form-group">
    <button class="btn btn-primary btn-sm new-project-btn pull-right">
        <i class="fa fa-user-plus"></i> Upload
    </button>
</div>
  </form>          
</div>
<script>
jQuery(function(){
    
    //jQuery(".member-select").select2();
    
    
    jQuery(".upload-btn").on("click", function(){
        jQuery(".upload-file").dialog("open")
    })

    jQuery(".upload-file").dialog({
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
        position: {my: "center", at: "center", of: window}
    });
});
</script>