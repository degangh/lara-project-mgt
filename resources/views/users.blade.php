@extends('layouts.layout')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
        <a href="/dashboard">@lang('dashboard.dashboard')</a>
    </li>
    <li class="breadcrumb-item">
        @lang('dashboard.users')
    </li>
    
</ol>
@include('layouts.message')
@include('layouts.user.create')
@include('layouts.user.list')

@endsection