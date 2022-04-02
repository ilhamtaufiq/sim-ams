@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pengguna</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
        </div>
        <div class="card-body">
            <div>
                Name: {{ $user->name }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Username: {{ $user->username }}
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop