@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Pengguna</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
            <div class="card-tools">
                <a href="{{route('users.create')}}"><button class="btn btn-primary">Tambah</button></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" width="1%">#</th>
                    <th scope="col" width="15%">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="10%">Username</th>
                    <th scope="col" width="10%">Roles</th>
                    <th scope="col" width="1%" colspan="3"></th>    
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <div class="d-flex">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop