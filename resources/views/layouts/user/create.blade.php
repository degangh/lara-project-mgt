<div class="row" style="margin-bottom:15px">
    <div class="offset-md-1 col-md-10 pt-2">
        <button class="btn btn-default create-user-btn btn-success pull-right pt-1 pb-1" >
        <i class="fa fa-user"></i> Add New User
        </button>
    </div>
</div>

<div class="edit-user" title="Create a New User" style="display:none">
    
            
    <form action="{{ url('/users') }}" method="post" name="edit-user-form">
    {{csrf_field()}}
    
        <div class="form-group">
            <lable for="project-name" class="control-label">True Name</label>

            <div class="">
                <input type="text" name = "name" id="user-name" class="form-control required">
            </div>
        </div>

        <div class="form-group">
            <lable for="user-email" class="control-label">Email</label>

            <div class="">
                <input type="text" id = "user-email" name = "email" class="form-control required">
            </div>
        </div>

        <div class="form-group">
            <lable for="passowrd" class="control-label">Password</label>

            <div class="">
                <input type="password" id = "password" name = "password" class="form-control required">
            </div>
        </div>

        <div class="form-group">
            <lable for="repeat-password" class="control-label">Email</label>

            <div class="">
                <input type="password" id= "repeat-password" name = "repeat_password" class="form-control required">
            </div>
        </div>
    </form>
        <div class="form-group">
            <div class="">
                <button class="btn btn-primary save-user-btn">
                <i class="fa fa-save"></i> Save User
                </button>
            </div>
        </div>


</div>

<script>
jQuery(function(){
    jQuery(".edit-user").dialog({
        width:650,
        autoOpen: false
    })

    jQuery(".create-user-btn").on("click", function(){
        jQuery(".edit-user").dialog("open");
    })

    jQuery(".save-user-btn").on("click", function(){
        jQuery("[name='edit-user-form']").submit();
    })
})
</script>


