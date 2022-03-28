@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @foreach ($foto as $f)
        <img src="{{$f->path}}">
    @endforeach
@stop

@section('css')
@stop

@section('js')
@stop