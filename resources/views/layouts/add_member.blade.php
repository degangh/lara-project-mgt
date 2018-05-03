<div class="add-members" title="Add members" style="display:none">
    
            
</div>

<script>
jQuery(function(){
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
})
</script>