<div class="upload-file" title="@lang('file.upload_title')" style="display:none">
 <form method="post" enctype='multipart/form-data' action="{{ url('/projects/'. $project->id. '/file') }}">
 {{csrf_field()}}   
 <div class="form-group">
 <lable class="control-label">@lang('file.upload')</label>

 <div class="">
     <input type = 'file' name='attchement' class='form-control form-control-small'>
 </div>
</div>
<div class="form-group">
    <button class="btn btn-primary btn-sm new-project-btn pull-right">
        <i class="fa fa-user-plus"></i> @lang('file.upload')
    </button>
</div>
  </form>          
</div>
<script>
$(function(){
    
    //$(".member-select").select2();
    
    
    $(".upload-btn").on("click", function(){
        $(".upload-file").dialog("open")
    })

    $(".upload-file").dialog({
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
        position: {my: "center", at: "center", of: window},
        fluid: true
    });
});
</script>