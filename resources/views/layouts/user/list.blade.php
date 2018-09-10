<div class="card mb-3">
<div class="card-header">
<i class="fas fa-fw fa-users"></i>
@lang('user.list')</div>
<div class="card-body">
<div class='table-responsive'>
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
    {{ $user->is_active ? __('user.activated') : __('user.deactivated')}}
    </td>
    <td class="10%">
    <form method='post' action="{{url('/users/')}}/{{$user->id}}/{{$user->is_ative == 0 ? 'activate' : 'deactivate'}}">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    @if($user->is_active == 1)
    <button class='btn btn-outline-secondary btn-sm'>
    @lang('user.deactivated')
    </button>
    @else
    <button class='btn btn-outline-secondary btn-sm'>
    @lang('user.recover')
    </button>
    @endif
    </form>
    </td>
    
    </tr>
    @endforeach
    </table>
    </div>
    </div>

</div>
</div>



