
        <div class="card">
            <div class='card-header'>
            <i class='fas fa-cogs'></i> Project Summary</div>
            <div class = 'card-body'>
            <h5>{{ $project->name }}</h5>
            <div>{{ $project->desc }}</div>
            <div class = 'small pull-left'>{{ ucfirst($project->user->name) }} </div>
            <div class='small pull-right'> {{ $project->created_at}} </div>
            </div>
        </div>