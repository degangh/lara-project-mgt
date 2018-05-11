
<div class="row mt-3">
        <div class="offset-md-1 col-md-10">
            <div class="card">
            <div class="card-header">Members in {{$project->name}}</div>
                <div class="card-body text-nowrap">
                <div class="row">
                <div class="card col-md-2 m-1 p-1" >
                    <div class="card-body">
                    {{$project->user->name}} 
                    </div>
                    <span class="fa fa-star text-warning" style="position:absolute;top:-7px;right:-7px;font-size:25px"></span>
                    </div>
                    @foreach ($project->members as $member)
                    <div class="card col-md-2 m-1 p-1" >
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
