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
                <td class="23%">
                {{$user->email}}
                </td>
                <td class="23%">
                    {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}
                </td>
                <td class="10%">
                {{ $user->is_active ? 'Activated' : 'De-Activated'}}
                </td>
                <td class="10%">
                <form method='post' action="{{url('/users/')}}/{{$user->id}}/{{$user->is_ative == 1 ? 'activate' : 'deactivate'}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                @if($user->is_active == 1)
                <button class='btn btn-outline-secondary'>
                De-Activate
                </button>
                @else
                <button class='btn btn-outline-secondary'>
                Recover
                </button>
                @endif
                </form>
                </td>
                
                </tr>
                @endforeach
                </div>
            </table>
            </div>
        </div>
    </div>
</div>

