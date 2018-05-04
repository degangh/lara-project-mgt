<div class="add-members" title="Add members" style="display:none">
    
    <select name="" class="member-select" multiple>
        <option value="1">Nicolas</option>
        <option value="2">Mac</option>
        <option value="3">Nonoh</option>
        <option value="4">Tanya</option>
    </select>
            
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