<!-- inbox List -->
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-project-diagram"></i>
              @lang('notification.notification_list')</div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                @foreach($notifications as $notification)
                <tr @if($notification->is_viewed == 0) class="font-weight-bold" @endif>
                <td>
                <input type="checkbox" class="notification-checkbox" data-notification_id="{{$notification->id}}">
                </td>
                <td>
                {{$notification->sender->name}}
                </td>
                <td>
                @lang($notification->translated)
                </td>
                <td class="text-right">
                {{$notification->created_at}}
                </td>
                
                </tr>
                @endforeach
                </div>
            </table>  
            {{$notifications->links()}}
            </div>
            </div>

 </div>
<script>
jQuery('.notification-checkbox').change(function()
{
 var nid = jQuery(this).data('notification_id');

 jQuery.ajax({
   
  headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
  url : '/notification/'+nid+'/viewed',
  type: 'PATCH',

 })

})
</script>