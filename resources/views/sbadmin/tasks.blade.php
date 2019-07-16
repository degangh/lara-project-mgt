@extends('layouts.layout')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{url("/dashboard")}}">@lang('layout.dashboard')</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{url("/projects")}}">@lang('layout.projects')</a>
    </li>
    <li class="breadcrumb-item active">{{$project->name}}</li>
</ol>
@include('layouts.message')
@include('layouts.project.summary')
@include ('layouts.task.create')
@include ('layouts.task.list')
@include ('layouts.member.list')
@include ('layouts.project.file')
@include ('layouts.project.upload')
@include ('layouts.member.edit')

@endsection
