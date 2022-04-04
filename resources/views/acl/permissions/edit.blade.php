@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ubah Permissions</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $permission->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop