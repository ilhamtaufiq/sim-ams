@extends('layouts.simple.master')

@section('title', 'Data Kontrak')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">


@endsection

@section('style')
    <style>
        .select2-offscreen,
        .select2-offscreen:focus {
            // Keep original element in the same spot
            // So that HTML5 valiation message appear in the correct position
            left: auto !important;
            top: auto !important;
        }

    </style>
@endsection

@section('breadcrumb-title')
    <h3>Data Pengguna</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Kontrak</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('users.create') }}"><button class="btn btn-primary">Tambah</button></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <th scope="col" width="10%">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" width="10%">Username</th>
                            <th scope="col" width="10%">Roles</th>
                            <th scope="col" width="1%" colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-info{{ $user->id }}">Show</a></td>
                                <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
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
    </div>
    @foreach ($users as $user)
        <div class="modal fade bd-example-modal-lg" id="modal-info{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Info Pengguna</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-lokasi{{ $user->id }}">Lokasi</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modal-lokasi{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal-content">
                    <form class="needs-validation" novalidate="" action="{{ route('tfl.lokasi') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Info Pengguna</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div>
                                    <input name="user_id" type="numeric" value="{{ $user->id }}" hidden>
                                    <select multiple="multiple" class="form-control" name="pekerjaan_id[]">
                                        @foreach ($pekerjaan as $item)
                                        @if (!is_null($item->tfl))
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <ul>
                                           @foreach ($user->tfl as $item)
                                               <li>{{$item->pekerjaan->nama_pekerjaan}}</li>
                                           @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                dropdownParent: $("#modal-content"),

            });
        });
    </script>
@endsection
