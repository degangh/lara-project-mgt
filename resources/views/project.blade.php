@extends('layouts.layout')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Projects</a>
    </li>
    <!--li class="breadcrumb-item active">Blank Page</li-->
</ol>


@include('layouts.message')

@include('layouts.project.create')

@include('layouts.project.list')

@include('layouts.project.edit')

@endsection
