
            <div class="card">
            <div class="card-header">
            <i class='fas fa-tasks'></i> Tasks in {{$project->name}}</div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                @foreach ($tasks as $task)
                <tr>
                <td class="col-md-6">
                {{$task->name}}
                </td>
                <td class="col-md-1">
                {{$task->user->name}}
                </td>
                <td class="col-md-4">
                    {{ \Carbon\Carbon::parse($task->due_time)->format('d/m/Y')}}
                </td>
                <td class="col-md-1">
                    @if ($task->is_complete == 0)
                        <form></form><form action="{{url('/tasks')}}/{{$task->id}}/complete" method="post">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <a href="#" class="complete-btn"><i class="far fa-square"></i></a>
                        </form>
                    @else
                        <i class="fa fa-check-square text-success"></i>
                    @endif
                
                </td>
                
                </td>
                </tr>
                @endforeach
                </div>
            </table>
            </div>
            </div>
        </div>
    

<div class="popup_confirm" title="Confirm" style="display:none;">
<div>Confirm to Set this task to completed?</div>
</div>
<script>
jQuery(function(){
    var cliked_form = null;
    
    jQuery(".popup_confirm").dialog({
        autoOpen: false,
        buttons: {
            "Confirm" : function(){
                clicked_form.submit();
                jQuery(this).dialog("close");
            }, 
            "Cancel" : function(){
                jQuery(this).dialog("close");
            }
        }
    });

    jQuery(".complete-btn").click(function(){
        clicked_form = jQuery(this).parent();
        jQuery(".popup_confirm").dialog("open");
    })

});

</script>