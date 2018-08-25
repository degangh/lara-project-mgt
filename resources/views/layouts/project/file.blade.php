
<div class="row mt-3 p-3">
        <div class="offset-md-1 col-md-10">
           <div class='card'>
            <div class="card-header">Files in Project {{$project->name}}</div>
            <div class="card-body">
            <table class="table table-striped">
                @foreach ($project->files as $file)
                <tr>
                <td><a href="{{url('/file/')}}/{{$file->id}}">{{$file->original_name}}</a></td>
                <td>{{$file->created_at}}</td>
                <td>{{$file->user->name}}</td>
                </tr>
                @endforeach
            </table>
            </div>
           </div>
        </div>
</div>
