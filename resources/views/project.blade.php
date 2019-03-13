@extends('layouts.layout')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{url("/dashboard")}}">@lang('layout.dashboard')</a>
    </li>
    <li class="breadcrumb-item active">@lang('layout.projects')</li>
</ol>


@include('layouts.message')

@include('layouts.project.create')

@include('layouts.project.list')

@include('layouts.project.edit')

@endsection
