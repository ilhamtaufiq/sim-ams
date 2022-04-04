@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pengguna</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
            <h4>Ubah Pengguna</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $user->name }}" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Name" required>
    
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input value="{{ $user->email }}"
                            type="email" 
                            class="form-control" 
                            name="email" 
                            placeholder="Email address" required>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input value="{{ $user->username }}"
                            type="text" 
                            class="form-control" 
                            name="username" 
                            placeholder="Username" required>
                        @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" 
                            name="role" required>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->name, $userRole) 
                                        ? 'selected'
                                        : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button onclick="history.back()" class="btn btn-warning">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop