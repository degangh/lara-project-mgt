@extends('layouts.layout')

@section('content')

@include('layouts.message')
@include ('layouts.task.create')
@include ('layouts.task.list')
@include ('layouts.member.list')
@include ('layouts.member.edit')

@endsection
