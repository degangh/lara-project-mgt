@extends('layouts.layout')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        Users
    </li>
    
</ol>
@include('layouts.message')
@include('layouts.user.create')
@include('layouts.user.list')

@endsection