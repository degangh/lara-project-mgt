<div class="add-members" title="Add members" style="display:none">
 <form>   
 <div class="form-group">
 <lable class="control-label">Members</label>

 <div class="">
     <select name = "members[]" id="member-select" class="form-control" multiple style="width:100% !important">
     @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
     @endforeach
     </select>
 </div>
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
        width: "500px",
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

    jQuery("#member-select").select2({
        theme: "classic"
    });

})
</script>