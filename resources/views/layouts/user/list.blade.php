<div class="row">
        <div class="offset-md-1 col-md-10">
            <div class="card">
            <div class="card-header">User List</div>
            <div class="card-body">
            <table class="table table-striped">
                @foreach ($users as $user)
                <tr>
                <td class="col-md-2">
                {{$user->name}}
                </td>
                <td class="col-md-6">
                {{$user->email}}
                </td>
                <td class="col-md-4">
                    {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}
                </td>
                
                </tr>
                @endforeach
                </div>
            </table>
            </div>
        </div>
    </div>
</div>

