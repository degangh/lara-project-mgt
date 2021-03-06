@extends('layouts.layout')

@section('content')

<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">@lang('dashboard.dashboard')</a>
            </li>
            <li class="breadcrumb-item active">@lang('dashboard.overview')</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-project-diagram"></i>
                  </div>
                  <div class="mr-5">@lang('dashboard.totalProjects', ['projectCount' => $projectCount])</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('/projects')}}">
                  <span class="float-left">@lang('dashboard.view')</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">@lang('dashboard.onProjects', ['onProjectCount' => $onProjectCount])</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#{{url('/users')}}">
                  <span class="float-left">@lang('dashboard.view')</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">@lang('dashboard.totalTasks', ['incompleteCount' => $incompleteCount])</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('my/tasks')}}">
                  <span class="float-left">@lang('dashboard.view')</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-angry"></i>
                  </div>
                  <div class="mr-5">@lang('dashboard.overdueTasks', ['overdueCount' => $overdueCount])</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">@lang('dashboard.view')</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        
          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Area Chart Example</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
@endsection