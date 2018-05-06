<div class="add-members" title="Add members" style="display:none">
 <form>   
 <div class="form-group">
 <lable class="control-label">Members</label>

 <div class="">
     <select name = "members[]" id="member-select" class="form-control" multiple style="width:100% !important">
     <option value="1">Nicolas</option>
     
     <option value="2">Nonoh</option>
     <option value="4">Wooloo</option>
     <option value="100">Degang</option>
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