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
                <input type="checkbox" class="notification-checkbox" data-notification_id="{{$notification->id}}" @if($notification->is_viewed) checked @endif>
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
 var ele = jQuery(this);

 jQuery.ajax({
   
  headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
  url : '/notification/'+nid+'/viewed',
  type: 'PATCH',

 }).done(function(data){
     if(data.notification.is_viewed == 1) ele.closest('tr').removeClass('font-weight-bold')
     else ele.closest('tr').addClass('font-weight-bold')
     var messageCount = jQuery('.message-count').text();
     jQuery('.message-count').text(messageCount-1);

     if (messageCount <= 1) jQuery('.message-count').hide();
 })

})
</script>