@extends('layouts.layout')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">@lang('layout.dashboard')</a>
    </li>
    <li class="breadcrumb-item">
        @lang('project.my_tasks')
    </li>
   
</ol>
@include('layouts.message')
@include ('layouts.task.my')

@endsection
