<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Tasks in {{$project->name}}</div>
            <div class="panel-body">
            <table class="table table-striped">
                @foreach ($tasks as $task)
                <tr>
                <td class="col-md-7">
                {{$task->name}}
                </td>
                <td class="col-md-4">
                    {{$task->due_time}}
                </td>
                <td class="col-md-1">
                    <form></form><form action="{{url('/tasks')}}/{{$task->id}}/complete" method="post">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <a href="#" class="complete-btn" onclik=""><i class="glyphicon glyphicon-ok"></i></a>
                </form>
                
                </td>
                
                </td>
                </tr>
                @endforeach
                </div>
            </table>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(".complete-btn").click(function(){
    var form = jQuery(this).parent();
    form.submit();
})
</script>