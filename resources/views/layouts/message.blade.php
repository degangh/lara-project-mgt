@if(Session::has('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
          </div>
@endif

@if(Session::has('errors'))
          <div class="alert alert-danger alert-dismissible fade in">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          
          <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
          </ul>
          
          </div>
@endif
