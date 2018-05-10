
<div class="row">
        <div class="offset-md-1 col-md-10">
            <div class="card">
            <div class="card-header">Members in {{$project->name}}</div>
                <div class="card-body">
                <div class="row">
                    @foreach ($project->members as $member)
                    <div class="card col-md-2 m-1" >
                    <div class="card-body">
                    {{$member->name}}
                    </div>
                    </div>
                    @endforeach
                </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
