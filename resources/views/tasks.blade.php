@extends('layouts.layout')

@section('content')

@include('layouts.message')
@include ('layouts.task.task_create')
@include ('layouts.task.task_list')
@include ('layouts.member.member_list')
@include ('layouts.member.add_member')

@endsection
