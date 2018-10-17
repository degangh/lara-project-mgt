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
                {{$notification->sender->name}}
                </td>
                <td>
                {{$notification->content}}
                </td>
                <td class="text-right">
                {{$notification->created_at}}
                </td>
                
                </tr>
                @endforeach
                </div>
            </table>  
            </div>
            </div>

 </div>
