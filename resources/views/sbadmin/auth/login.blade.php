<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Project')}} - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('sbadmin/css/app.css') }}" rel="stylesheet">

    
    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sbadmin/sb-admin.css') }}" rel="stylesheet">
    <link id="favicon" rel="icon" type="image/x-icon" href="/favicon.ico">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" value = "{{ old('email') }}">
                @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
                <label for="email">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" class="form-control" placeholder="Password" required="required" name = 'password'>
                @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <label for="password">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type='submit' class="btn btn-primary btn-block" value="Login">
          </form>
          <div class="text-center">
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

        <!-- Bootstrap core JavaScript-->

    <script src="{{ asset('sbadmin/js/app.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('sbadmin/js/sbadmin/sb-admin.min.js') }}"></script>
    <script src="{{ asset('sbadmin/js/jquery.easing.js') }}"></script>

  </body>

</html>
