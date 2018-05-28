<div class="row">
        <div class="offset-md-1 col-md-10">
            <div class="card">
            <div class="card-header">User List</div>
            <div class="card-body">
            <table class="table table-striped">
                @foreach ($users as $user)
                <tr>
                <td class="33%">
                {{$user->name}}
                </td>
                <td class="33%">
                {{$user->email}}
                </td>
                <td class="33%">
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

