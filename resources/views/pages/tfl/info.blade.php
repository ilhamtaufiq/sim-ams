@extends('layouts.simple.master')
@section('title', 'Detail')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <style>
        #map {
            height: 300px;
        }

        #mapid {
            height: 300px;
        }

    </style>
    <script src="{{ asset('js') }}/getloc.js"></script>

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Detail</h3>
@endsection

@section('breadcrumb-items')
    {{-- <li class="breadcrumb-item">Kontrak</li> --}}
    {{-- <li class="breadcrumb-item active">Kegiatan</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div>
            <div class="row product-page-main p-0">
                <div class="col-xl-4 xl-cs-65 box-col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-slider owl-carousel owl-theme" id="sync1">
                                @foreach ($foto as $f)
                                    <div class="item"><img src="{{ $f->path }}" alt=""></div>
                                @endforeach
                            </div>
                            <div class="owl-carousel owl-theme" id="sync2">
                                @foreach ($foto as $f)
                                    <div class="item"><img src="{{ $f->path }}" alt=""></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 xl-100 box-col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-page-details">
                                <h4>{{$title}}</h4>
                            </div>
                            <hr>
                            <div>
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td> <b>Pagu</b></td>
                                            @php
                                                $pagu = 'Rp' . number_format($pagu, 2, ',', '.');
                                            @endphp
                                            <td>{{ $pagu ?: 'Data Belum Diinput' }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Kontrak</b></td>
                                            @if (!is_null($tfl->pekerjaan->detail))
                                                @php
                                                    $kontrak = 'Rp' . number_format($tfl->pekerjaan->detail->harga_kontrak, 2, ',', '.');
                                                @endphp
                                            @endif
                                            <td>{{ $kontrak ?? 'Nilai Belum Diinput' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Output</b></td>
                                           <td> @foreach ($tfl->pekerjaan->output as $o)
                                            <ul>
                                                <li>{{$o->komponen}} - {{$o->volume}}</li>
                                            </ul>
                                            @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td><b>Realisasi :</b></td>
                                            <td> @foreach ($tfl->pekerjaan->realisasi_output as $r)
                                                <ul>
                                                    <li>{{$r->output->komponen}} - {{$r->realisasi}}</li>
                                                </ul>
                                                @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td><b>Progress</b></td>
                                            <td>
                                                @php
                                                $total_output = $tfl->pekerjaan->output->sum('volume');
                                                $total_realisasi = $tfl->pekerjaan->realisasi_output->sum('realisasi');
                                                if ($total_output == 0) {
                                                    $progress_fisik = null;
                                                } else {
                                                $progress_fisik = ($total_realisasi / $total_output) * 100;
                                                }
                                                // $progress_fisik = ($total_realisasi / $total_output) * 100;

                                            @endphp
                                            {{ number_format($progress_fisik) }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td><b>Program</b></td>
                                            <td>{{ $pekerjaan->kegiatan->program }}</td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="m-t-15">
                                <button class="btn btn-primary m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-foto"> <i class="fa fa-camera me-1"></i>Upload Foto</button>
                                <button class="btn btn-success m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-dokumen"> <i class="fa fa-file me-1"></i>Upload Dokumen</button>
                                <button class="btn btn-info m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-output"> <i class="fa fa-check me-1"></i>Output</button>
                                <button class="btn btn-info m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-realisasi"> <i class="fa fa-check me-1"></i>Realisasi</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 xl-cs-35 box-col-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- side-bar colleps block stat-->
                            <div class="collection-filter-block">
                                <ul class="pro-services">
                                    <li>
                                        <div class="media">
                                            <i data-feather="archive"></i>
                                            <div class="media-body">
                                                <h5>Nomor Kontrak </h5>
                                                <p>{{ $tfl->pekerjaan->detail->no_spk ?? 'Data Belum Diinput' }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="flag"></i>
                                            <div class="media-body">
                                                <h5>Pelaksana </h5>
                                                <p>{{ $pekerjaan->detail->nama_pelaksana ?? 'Data Belum Diinput' }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="calendar"></i>
                                            <div class="media-body">
                                                <h5>Mulai </h5>
                                                <p>
                                                    @if (is_null($tfl->pekerjaan->detail))
                                                        Data Belum Diinput
                                                    @else
                                                        {{ date('j F, Y', strtotime($tfl->pekerjaan->detail->tgl_mulai)) }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="calendar"></i>
                                            <div class="media-body">
                                                <h5>Selesai </h5>
                                                <p>
                                                    @if (is_null($tfl->pekerjaan->detail))
                                                        Data Belum Diinput
                                                    @else
                                                        {{ date('j F, Y', strtotime($tfl->pekerjaan->detail->tgl_mulai ?? 'data belum diinput')) }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="clock"></i>
                                            <div class="media-body">
                                                <h5>Masa Pelaksanaan</h5>
                                                <p>{{ $days ?? 'Data Belum Diinput' }}</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="mapid"></div>
            </div>
        </div>
        {{-- <div class="card">
            <div class="row product-page-main">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab"
                                aria-controls="top-home" aria-selected="false">File</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile"
                                role="tab" aria-controls="top-profile" aria-selected="false">Map</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <ul class="mb-0 m-t-20">
                                @foreach ($dokumen as $dok)
                                    <li><a href="{{ $dok->path }}">{{ $dok->file }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p class="mb-0 m-t-20">Peta Lokasi</p>
                            <div class="map" id="map2" data-name="Map 2" data-coords="[48.886719,2.343076]" data-zoom="10" data-color="#ff654f" data-tileserver="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoib2xpdmllcmMiLCJhIjoiY2s5dnNnZWoyMDIzNDNzb2Y1dmQ4MGNtMCJ9.m4U-wYcS4EPcKe9nVXIbUA" data-attribution="&lt;a href=&quot;//www.openstreetmap.org/&quot;&gt;OSM&lt;/a&gt; | &lt;a href=&quot;//www.mapbox.com/&quot;&gt;Mapbox&lt;/a&gt;"></div>                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-foto" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Foto</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="{{ route('foto.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <input type="text" value="{{ $tfl->pekerjaan->id }}" name="pekerjaan_id" hidden>
                                        <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                                        @if ($errors->has('files'))
                                            @foreach ($errors->get('files') as $error)
                                                <div class="invalid-feedback"><a
                                                        class="text-danger">{{ $error }}</a></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="">Koordinat</label>
                                    <div id="map"></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <button id="clickMe" class="btn btn-primary btn-toast" type="button">Tampilkan
                                    Lokasi</button>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" id="lat" name="lat" class="form-control" placeholder="Latitude">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="long" name="long" class="form-control"
                                        placeholder="Longtitude">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="">Keterangan</label>
                                        <textarea type="text" name="keterangan" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
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
    <div class="modal fade bd-example-modal-lg" id="modal-dokumen" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Dokumen</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="{{ route('dokumen.post') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <input type="text" value="{{ $tfl->pekerjaan->id }}" name="pekerjaan_id" hidden>
                                        <input type="text" value="{{ $tfl->pekerjaan->nama_pekerjaan }}" name="nama_pekerjaan"
                                            hidden>
                                        <input type="file" name="files[]" multiple class="form-control" accept="*">
                                        @if ($errors->has('files'))
                                            @foreach ($errors->get('files') as $error)
                                                <div class="invalid-feedback"><a
                                                        class="text-danger">{{ $error }}</a></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="">Keterangan</label>
                                        <textarea type="text" name="keterangan" class="form-control" id=""></textarea>
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
    <div class="modal fade bd-example-modal-lg" id="modal-output" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Ouput</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="/target/output" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Target Output</label>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="pekerjaan_id" value="{{$tfl->pekerjaan->id}}" hidden>
                                        <select name="komponen" id="komponen" class="form-control">
                                            <option value="Tangki Septik Komunal">Tangki Septik Komunal</option>
                                            <option value="Tangki Septik Individual">Tangki Septik Individual</option>
                                            <option value="Sambungan Rumah">Sambungan Rumah</option>
                                        </select>
                                        <label for="floating-input">Komponen</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="volume" type="number" class="form-control" id="floating-input" autocomplete="off">
                                        <label for="floating-input">Volume</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="satuan" type="text" class="form-control" id="floating-input" autocomplete="off">
                                        <label for="floating-input">Satuan</label>
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
    <div class="modal fade bd-example-modal-lg" id="modal-realisasi" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Realisasi Ouput</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="/realisasi/output/" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($tfl->pekerjaan->output as $o)
                                <label class="form-label">{{ $o->komponen }} - {{$o->id}}</label>
                                    <div class="form-floating mb-3">
                                        <input name="pekerjaan_id" type="number" value="{{$tfl->pekerjaan->id}}" hidden>
                                        <input name="output_id[{{$i++}}]" type="number" value="{{$o->id}}" hidden>
                                        <input name="satuan[{{$i++}}]" type="text" value="{{$o->satuan}}" hidden>
                                        <input name="realisasi[]" type="numeric" class="form-control" autocomplete="off" required="">
                                    </div>
                                @endforeach
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

    <script src="{{ asset('js') }}/map.js"></script>

    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        document.querySelector(".btn-toast").addEventListener('click', function() {
            Swal.fire({
                toast: true,
                html: '<ul id="status" class="progressing">' +
                    '</ul>',
                icon: 'info',
                title: 'Mencari titik Koordinat... (Izinkan Akses Data Lokasi)',
                position: 'top-end',
                showConfirmButton: false,
                timer: 12000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        });
    </script>
    <script>
        @foreach ($foto as $data)
            var informasi = `
     <p>{{ $data->keterangan }}</p>
    `
            L.marker([{{ $data->lat }}, {{ $data->long }}])
                .addTo(mapid)
                .bindPopup(informasi);
        @endforeach
    </script>

@endsection
