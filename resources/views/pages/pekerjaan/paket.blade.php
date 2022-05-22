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
    <h3>Data Paket Pekerjaan</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Kontrak</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tahun Anggaran 2022</h5>
                        <div class="card-header-right">
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#modal-paket"
                                data-bs-original-title="" title=""> <span class="fa fa-edit"></span>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table id="example1" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kegiatan</th>
                                        <th>Nama Pelaksana</th>
                                        <th>Alamat Pelaksana</th>
                                        <th>NPWP Pelaksana</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><a
                                                    href="/pekerjaan/{{ $item->pekerjaan->id }}">{{ $item->pekerjaan->nama_pekerjaan }}</a>
                                            </td>
                                            <td>{{ $item->nama_pelaksana }}</td>
                                            <td>{{ $item->alamat_pelaksana }}</td>
                                            <td>{{ $item->npwp_pelaksana }}</td>
                                            <td>
                                                <div class="card-body btn-showcase">
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modal-hapus{{ $item->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                    <button class="btn btn-warning btn-edit" data-bs-toggle="modal"
                                                        data-bs-target="#modal-ubah" id="edit-item"
                                                        data-id="{{ $item->id }}"><i
                                                            class="fa fa-edit"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-paket" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal-content-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kontrak</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-tambah">
                    <form class="needs-validation" novalidate="" action="{{ route('paket.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Program</label>
                                <select id="program_id" name="program_id" class="form-control select2" required
                                    style="width: 100%;">
                                    <option selected disabled value="">Pilih Program/Kegiatan/Sub Kegiatan</option>
                                    <optgroup label="Sanitasi">
                                        <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                                        <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat
                                            Skala Permukiman</option>
                                    </optgroup>
                                    <optgroup label="Air Minum">
                                        <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                        <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                        <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan_id">Kegiatan</label>
                                <select id="pekerjaan_id" value="" name="pekerjaan_id" class="form-control select2"
                                    style="width: 100%;" required>
                                    <option value="">Pilih Kegiatan</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Nama Pelaksana</label>
                                        <input name="nama_pelaksana" type="text" class="form-control" required="">
                                        <div class="invalid-feedback"><a class="text-danger">Nomor SPK Invalid!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Data Pelaksana</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat_pelaksana" type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">NPWP</label>
                                        <input name="npwp_pelaksana" type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3" tabindex="0" id="currency">
                                        <label class="form-label">Keterangan</label>
                                        <div class="input-group input-group-flat">
                                            <textarea class="form-control" name="keterangan" id=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($data as $d)
        <div class="modal modal-blur fade" id="modal-hapus{{ $d->id }}" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path
                                d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
                        <h3>Apakah anda yakin?</h3>
                        <div class="text-muted">Hapus Paket Pekerjaan {{ $d->pekerjaan->nama_pekerjaan }}</div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Batal
                                    </a></div>
                                <form action="{{ route('paket.destroy', $d->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div class="col">
                                        <button class="btn btn-danger w-100" type="submit">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade bd-example-modal-lg" id="modal-ubah" role="dialog" tabindex="-1"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal-content-ubah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kontrak</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-ubah">
                    <form class="needs-validation" novalidate="" action=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Program</label>
                                <select id="program" name="program_id" class="form-control select2 select2-offscreen"
                                    required style="width: 100%;">
                                    <option selected disabled value="">Pilih Program/Kegiatan/Sub Kegiatan</option>
                                    <optgroup label="Sanitasi">
                                        <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                                        <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat
                                            Skala Permukiman</option>
                                    </optgroup>
                                    <optgroup label="Air Minum">
                                        <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                                        </option>
                                        <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                                        </option>
                                        <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                                        </option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan_id">Kegiatan</label>
                                <select id="kegiatan" value="" name="pekerjaan_id"
                                    class="form-control select2 select2-offscreen" style="width: 100%;" required>
                                    <option value="">Pilih Kegiatan</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Nama Pelaksana</label>
                                        <input id="pelaksana" name="nama_pelaksana" type="text" class="form-control"
                                            required="">
                                        <div class="invalid-feedback"><a class="text-danger">Nomor SPK Invalid!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Data Pelaksana</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input id="alamat" name="alamat_pelaksana" type="text" class="form-control"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">NPWP</label>
                                        <input id="npwp" name="npwp_pelaksana" type="text" class="form-control"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3" tabindex="0" id="currency">
                                        <label class="form-label">Keterangan</label>
                                        <div class="input-group input-group-flat">
                                            <textarea id="keterangan" class="form-control" name="keterangan" id=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script>
        
        @if ($errors->any())
            Swal.fire({
                title: 'Error!',
                text: '{{ implode('', $errors->all(':message')) }}',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        @endif
    </script>
    <script>
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                type: "GET",
                url: "{{ url('edit/paket') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('form').attr('action', 'paket/'+res.id);
                    $('#pelaksana').val(res.nama_pelaksana);
                    $('#npwp').val(res.npwp_pelaksana);
                    $('#alamat').val(res.alamat_pelaksana);
                    $('#keterangan').val(res.keterangan);
                    $("#program").val(res.pekerjaan.kegiatan.id);
                    var $newOption = $("<option selected='selected'></option>").val(res.pekerjaan.id)
                        .text(res.pekerjaan.nama_pekerjaan)
                    $("#kegiatan").append($newOption);
                }
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                ordering: true,
                info: true,
                buttons: [{
                        extend: 'copyHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                ]
            });
            $('#example1_filter input').addClass('form-control form-control-sm'); // <-- add this line
            $('#example1_filter label').addClass('text-muted'); // <-- add this line
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery($('#program_id, #program')).on('change', function() {
                var kegID = jQuery(this).val();
                if (kegID) {
                    jQuery.ajax({
                        url: '/pekerjaan/kegiatan/paket/' + kegID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery($('#pekerjaan_id, #kegiatan')).empty();
                            jQuery.each(data, function(key, value) {
                                if (value.detail != null) {
                                    jQuery($('#pekerjaan_id, #kegiatan')).empty();
                                } else {
                                    $($('#pekerjaan_id, #kegiatan')).append('<option value="' +
                                        value.id + '">' + value.nama_pekerjaan +
                                        '</option>');
                                    // $($('#pagu')).val(value.pagu);
                                }
                            });
                        }
                    });
                } else {
                    $($('#pekerjaan_id')).empty();
                }
            });
        });
    </script>
@endsection
