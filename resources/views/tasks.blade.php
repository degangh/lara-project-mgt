@extends('layouts.layout')

@section('content')

@include('layouts.message')
@include('layouts.project.summary')
@include ('layouts.task.create')
@include ('layouts.task.list')
@include ('layouts.member.list')
@include ('layouts.project.file')
@include ('layouts.project.upload')
@include ('layouts.member.edit')

@endsection
