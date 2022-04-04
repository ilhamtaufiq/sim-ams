@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles Pengguna</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
        <div class="card-tools">
            <a href="{{route('roles.create')}}"><button class="btn btn-primary">Tambah</button></a>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                   <th width="1%">No</th>
                   <th>Name</th>
                   <th width="3%" colspan="3">Action</th>
                </tr>
                  @foreach ($roles as $key => $role)
                  <tr>
                      <td>{{ $role->id }}</td>
                      <td>{{ $role->name }}</td>
                      <td>
                          <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>
                      </td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                      </td>
                      <td>
                          {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                          {!! Form::close() !!}
                      </td>
                  </tr>
                  @endforeach
              </table>
      
              <div class="d-flex">
                  {!! $roles->links() !!}
              </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop