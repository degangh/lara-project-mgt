<div class="row mt-5">
    <div class="offset-md-1 col-md-10">
        <div class="card">
            <div class='card-header'>Project Summary</div>
            <div class = 'card-body'>
            <h5>{{ $project->name }}</h5>
            <div>{{ $project->desc }}</div>
            <div class = 'small pull-left'>{{ ucfirst($project->user->name) }} </div>
            <div class='small pull-right'> {{ $project->created_at}} </div>
            </div>
        </div>
    </div>
</div>