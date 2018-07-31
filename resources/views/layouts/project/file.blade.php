
<div class="row mt-3 p-3">
        <div class="offset-md-1 col-md-10">
           <div class='card'>
            <div class="card-header">Files in Project {{$project->name}}</div>
            <div class="card-body">
            <table class="table table-striped">
                @foreach ($files as $file)
                <tr>
                <td>{{$file->original_name}}</td>
                </tr>
                @endforeach
            </div>
           </div>
        </div>
</div>
