
           <div class='card m-3'>
            <div class="card-header">
            <i class='far fa-file'></i> 
            Files in Project {{$project->name}}</div>
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
       