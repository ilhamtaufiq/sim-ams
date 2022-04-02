@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="1%">Guard</th> 
                </thead>

                @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop