<div class="row" style="margin-bottom:15px">
    <div class="col-md-12 pt-2">
        <button class="btn btn-default create-user-btn btn-success btn-sm pull-right pt-1 pb-1" >
        <i class="fa fa-user"></i> @lang('user.create')
        </button>
    </div>
</div>

<div class="edit-user" title="@lang('user.create')" style="display:none">
    
            
    <form action="{{ url('/users') }}" method="post" name="edit-user-form">
    {{csrf_field()}}
    
        <div class="form-group">
            <lable for="project-name" class="control-label">@lang('user.truename')</label>

            <div class="">
                <input type="text" name = "name" id="user-name" class="form-control required">
            </div>
        </div>

        <div class="form-group">
            <lable for="user-email" class="control-label">@lang('user.email')</label>

            <div class="">
                <input type="text" id = "user-email" name = "email" class="form-control required">
            </div>
        </div>

        <div class="form-group">
            <lable for="passowrd" class="control-label">@lang('user.password')</label>

            <div class="">
                <input type="password" id = "password" name = "password" class="form-control required">
            </div>
        </div>

        <div class="form-group">
            <lable for="repeat-password" class="control-label">@lang('user.repeat_password')</label>

            <div class="">
                <input type="password" id= "repeat-password" name = "password_confirmation" class="form-control required">
            </div>
        </div>
    </form>
        <div class="form-group">
            <div class="">
                <button class="btn btn-primary save-user-btn">
                <i class="fa fa-save"></i> @lang('user.save')
                </button>
            </div>
        </div>


</div>

<script>
$(function(){
    $(".edit-user").dialog({
        width:650,
        autoOpen: false
    })

    $(".create-user-btn").on("click", function(){
        $(".edit-user").dialog("open");
    })

    $(".save-user-btn").on("click", function(){
        $("[name='edit-user-form']").submit();
    })
})
</script>


