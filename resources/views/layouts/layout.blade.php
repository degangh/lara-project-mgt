<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('layout.page_title')</title>

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
<!-- Bootstrap core JavaScript-->

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/jquery-ui.min.js') }}"></script>
    
    
    <!-- Custom styles for this template-->
    <link href="{{ mix('css/sbadmin/sb-admin.css') }}" rel="stylesheet">


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/select2/select2.min.js') }}"></script>
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet">
  </head>

  <body id="page-top" class='sidebar-toggled'>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="{{url('/')}}">@lang('layout.page_title')</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-globe fa-fw"></i>
            
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="/lang/en">@lang('layout.english')</a>
            <a class="dropdown-item" href="/lang/zh-CN">@lang('layout.chinese')</a>
            
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger message-count" style="display:none">0</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right message-drop-down" aria-labelledby="messagesDropdown">
            
            <!--div class="dropdown-divider"></div-->
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('layout.dashboard')</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/projects">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>@lang('layout.projects')</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/my/tasks">
            <i class="fas fa-tasks"></i>
            <span>@lang('layout.my_tasks')</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/notification/inbox">
            <i class="far fa-fw fa-envelope"></i>
            <span>@lang('layout.inbox')</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/users">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('layout.users')</span>
          </a>
        </li>
        <!--li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sample</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sample</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Sample</span></a>
        </li-->
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          
          <!-- Page Content -->
          
          @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>@lang('layout.footer')</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Confirm to log out from the system?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a href="#" 
              onclick="event.preventDefault();
          
                        document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Core plugin JavaScript-->
    <script src="{{ mix('js/sbadmin/sb-admin.min.js') }}"></script>
    <script src="{{ mix('js/jquery.easing.js') }}"></script>
    

    <!-- Custom scripts for all pages-->
    <script>
    jQuery(document).ready(function(){
      jQuery.get('/notification/new', function(data){
        
        var messageCount = data.notification.length;
        jQuery('.message-count').text(messageCount);
        
        var max_records = (data.notification.length > 5) ? 5 : data.notification.length;
        

        if (data.notification.length < 1)
        {
          jQuery(".message-drop-down").append('<a class="dropdown-item" href="#">@lang('notification.no_new')</a>')
          
          
        }
        else
        {
          for (var i = 0; i < max_records; i++)
          {
            jQuery(".message-drop-down").append('<a class="dropdown-item" href="#"><div><strong>'+ data.notification[i].sender.name +'</strong><span class="float-right">' + data.notification[i].created_at + '</span></div>' + data.notification[i].translated + '</a>')
            jQuery(".message-drop-down").append('<div class="dropdown-divider"></div>');
            
          }
          jQuery('.message-count').show();

        }
        jQuery(".message-drop-down").append('<a class="dropdown-item" href="/notification/inbox"><strong>@lang("notification.view_all")<i class="fas fa-angle-right"></i></strong></a>');
      })
    })
    </script>

  </body>

</html>
