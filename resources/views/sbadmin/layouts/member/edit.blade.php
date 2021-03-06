<style>
.select2-container {
    width:100% !important;
    padding: 0;
}

.select2-selection__choice {
    background-color: #ffffff !important;
}
</style>

<div class="add-members" title="@lang('project.add_member')" style="display:none">
 <form method="post" action="{{ url('/projects/'. $project->id. '/members') }}">
 {{csrf_field()}}   
 <div class="form-group">
 <lable class="control-label">@lang('project.members')</label>

 <div class="">
     <select name = "members[]" id="member-select" class="form-control" multiple>
     @foreach ($users as $user)
        <option value="{{$user->id}}" 
        @if (in_array($user->id, $project->members->pluck('id')->toArray()))  
            selected = "selected"
        @endif 
        >{{$user->name}}</option>
     @endforeach
     </select>
 </div>
</div>
<div class="form-group">
    <button class="btn btn-primary btn-xs new-project-btn pull-right">
        <i class="fa fa-user-plus"></i> @lang('project.save')
    </button>
</div>
  </form>          
</div>


<script>
jQuery(function(){
    
    //jQuery(".member-select").select2();
    
    
    jQuery(".add-member-btn").on("click", function(){
        jQuery(".add-members").dialog("open")
    })

    jQuery(".add-members").dialog({
        autoOpen: false,
        modal: true,
        width: '90%',
        maxWidth:'500px',
        show: {
            effect: "fade",
            duration: 800
        },

        hide: {
            effect: "fade",
            duration: 800
        },
        position: {my: "center", at: "center", of: window},
        fluid: true,
    });

    jQuery("#member-select").select2({
        theme: "classic",
        width: "resolve"
    });

})
</script>