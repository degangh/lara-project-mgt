@if(Session::has('success'))
          <div class="alert alert-success mt-2 p-1">
              {{ Session::get('success') }}
          </div>
@endif

@if(Session::has('errors'))
          <div class="alert alert-danger alert-dismissible fade-in mt-2 p1">
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
