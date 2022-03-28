@extends('adminlte::page')

@section('title', 'Detail Pekerjaan')

@section('content_header')
    <h1>Detail Pekerjaan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail {{$pekerjaan->nama_pekerjaan ?: 'Data Belum Diinput'}}</h3>
        <div class="card-tools">
            @if ($pekerjaan->detail != null)
                <button class="btn btn-warning btn-xs">Ubah Detail</button>
            @else
                {{-- <button class="btn btn-primary btn-xs">Tambah Detail</button> --}}
                <a href="/foto/pekerjaan/{{$pekerjaan->id}}"><button class="btn btn-warning btn-xs">Upload Foto</button></a>
            @endif

        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Pagu</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$pekerjaan->pagu ?: 'Data Belum Diinput'}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Harga Kontrak</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$pekerjaan->detail->harga_kontrak ?? 'Data Belum Diinput'}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Masa Pelaksanaan</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$days ?? 'Data Belum Diinput'}} Hari Kalender
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>Detail Pengadaan</h4>
                            <div class="post">
                                <div class="user-block">
                                   <p>Nomor SPK: <b>{{$pekerjaan->detail->no_spk ?? 'Data Belum Diinput'}}</b></p>
                                   <p>Tanggal SPK: <b>{{$pekerjaan->detail->tgl_spk ?? 'Data Belum Diinput'}}</b></p>
                                </div>
                                <p>Mulai: <b>{{$pekerjaan->detail->tgl_mulai ?? 'Data Belum Diinput'}}</b></p>
                                <p>Selesai: <b>{{$pekerjaan->detail->tgl_selesai ?? 'Data Belum Diinput'}}</b></p>
                            </div>
                    <div class="post clearfix">
                        <div class="user-block">
                            <p>Nomor NPHD:</p>
                            <p>Tanggal NPHD:</p>
                        </div>
                        <p>Nomor Berita Acara Serah Terima:</p>
                        <p>Tanggal Berita Acara Serah Terima:</p>
                    </div>
                    <div class="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title">Foto Progress Fisik</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="btn-group w-100 mb-2">
                                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Semua </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="0">0%</a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="50">50%</a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="75">70%</a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="100">100%</a>
                                            </div>
                                            <div class="filter-container p-0 row">
                                                @foreach($foto as $f)
                                                <div class="filtr-item col-sm-2" data-category="{{$f->progress}}" data-sort="{{$pekerjaan->nama_pekerjaan}}">
                                                <a href="{{$f->path}}" data-toggle="lightbox" data-title="{{$pekerjaan->nama_pekerjaan}} - {{$f->progress}}%">
                                                <img src="{{$f->path}}" class="img-fluid mb-2" alt="white sample" />
                                                </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary">{{$pekerjaan->kegiatan->program ?? 'Data Belum Diinput'}}</h3>
                    <p class="text-muted">{{$pekerjaan->nama_pekerjaan ?? 'Data Belum Diinput'}}</p>
                    <p class="text-muted">Desa {{$pekerjaan->desa->n_desa ?? 'Data Belum Diinput'}} Kecamatan {{$pekerjaan->kec->n_kec ?: 'Data Belum Diinput'}}</p>
                    <br>
                    <div class="text-muted">
                    <p class="text-sm">Nama CV/PT/KSM
                    <b class="d-block">{{$pekerjaan->detail->nama_pelaksana ?? 'Data Belum Diinput'}}</b>
                    </p>
                    <p class="text-sm">Pengawas Lapangan
                    <b class="d-block">{{$pekerjaan->detail->nama_pengawas ?? 'Data Belum Diinput'}}</b>
                    </p>
                </div>
                    <h5 class="mt-5 text-muted">Dokumentasi</h5>
                    <ul class="list-unstyled">
                    <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                    </li>
                    <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> {{$dokumen}}</a>
                    </li>
                    <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                    </li>
                    <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                    </li>
                    <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                    </li>
                    </ul>
                <div class="text-center mt-5 mb-3">
                    <a href="#" class="btn btn-sm btn-primary">Add files</a>
                    <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.css">
@stop

@section('js')
<script src="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/filterizr/jquery.filterizr.min.js"></script>
<script>
      $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@stop