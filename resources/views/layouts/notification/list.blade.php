<!-- inbox List -->
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-project-diagram"></i>
              @lang('notification.notification_list')</div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                @foreach($notifications as $notification)
                <tr>
                <td>
                {{$notification->sender->name}}
                </td>
                <td>
                {{$notification->content}}
                </td>
                
                </tr>
                @endforeach
                </div>
            </table>  
            </div>
            </div>

 </div>
