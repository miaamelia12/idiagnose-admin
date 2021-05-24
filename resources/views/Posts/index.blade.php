@extends('layout.backend-dashboard.app')
@section('title','Monika - Admin')

@section('content')
@include('Posts.html')
@endsection

@section('extra_javascript')
@include('Posts.javascript')
@endsection