@extends('layouts.tabler')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <style>
        .portfolio-menu {
            text-align: center;
        }

        .portfolio-menu ul li {
            display: inline-block;
            margin: 0;
            list-style: none;
            padding: 10px 15px;
            cursor: pointer;
            -webkit-transition: all 05s ease;
            -moz-transition: all 05s ease;
            -ms-transition: all 05s ease;
            -o-transition: all 05s ease;
            transition: all .5s ease;
        }

        .portfolio-item {
            /*width:100%;*/
        }

        .portfolio-item .item {
            /*width:303px;*/
            float: left;
            margin-bottom: 10px;
        }

    </style>
@endsection
@section('content')
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            @php
                                                $pagu = 'Rp' . number_format($pekerjaan->pagu, 2, ',', '.');
                                            @endphp
                                            {{ $pagu ?: 'Data Belum Diinput' }}
                                        </div>
                                        <div class="text-muted">
                                            Pagu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            @if (!is_null($pekerjaan->detail))
                                                @php
                                                    $kontrak = 'Rp' . number_format($pekerjaan->detail->harga_kontrak, 2, ',', '.');
                                                @endphp
                                            @endif
                                            {{ $kontrak ?? 'Nilai Belum Diinput' }}
                                        </div>
                                        <div class="text-muted">
                                            Nilai Kontrak
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            {{ $days ?? 'Data Belum Diinput' }}
                                        </div>
                                        <div class="text-muted">
                                            Masa Pelaksanaan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-facebook text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            132 Likes
                                        </div>
                                        <div class="text-muted">
                                            21 today
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Ringkasan</h3>
                        <span>Nomor Kontrak: {{ $pekerjaan->detail->no_spk ?? 'Data Belum Diinput' }}</span> <br>
                        <span>Pelaksana: {{ $pekerjaan->detail->nama_pelaksana ?? 'Data Belum Diinput' }}</span> <br>
                        <span>Mulai:
                            @if (is_null($pekerjaan->detail))
                                Data Belum Diinput
                            @else
                            {{ date('j F, Y', strtotime($pekerjaan->detail->tgl_mulai)) }}
                            @endif
                        </span><br>
                        <span>Selesai:
                            @if (is_null($pekerjaan->detail))
                                Data Belum Diinput
                            @else
                            {{ date('j F, Y', strtotime($pekerjaan->detail->tgl_mulai ?? 'data belum diinput')) }}    
                            @endif
                        </span><br>
                        <span>
                            Output:
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">Upload Dokumen</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$pekerjaan->desa->n_desa}} - {{$pekerjaan->kec->n_kec}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Foto Pelaksanaan</h3>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-sm">Upload Foto</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="btn-group w-100 mb-2">
                            <a class="btn btn-dark active" href="javascript:void(0)" data-filter="all"> Semua </a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="0">0%</a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="50">50%</a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="75">75%</a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="100">100%</a>
                        </div>
                        <div class="filter-container">
                            @foreach ($foto as $f)
                                <div class="filtr-item col-sm-2" data-category="{{ $f->progress }}">
                                    <a href="{{ $f->path }}" class="fancylight popup-btn" data-fancybox-group="light">
                                        <img class="img-fluid" src="{{ $f->path }}" alt="">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/filterizr/jquery.filterizr.min.js"></script>
    <script>
        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
        $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endsection
