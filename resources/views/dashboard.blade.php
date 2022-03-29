@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
            <h4>Ringkasan Pekerjaan Bidang Air Minum dan Sanitasi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Rp{{$pagu}}</h3>
                            {{-- <p>{{number_format($total_pagu)}}</p> --}}
                            <p>Total Pagu</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$total_pekerjaan}}</h3>
                            <p>Total Pekerjaan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="card-header border-transparent">
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table m-0">
                <thead>
                    <tr>
                    <th>Kegiatan</th>
                    <th>Pekerjaan</th>
                    <th>Pagu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</td>
                        <td>{{$am1->count()}} Lokasi</td>
                        <td>{{number_format($am1->sum('pagu'))}}</td>
                    </tr>
                    <tr>
                        <td>Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</td>
                        <td>{{$am2->count()}} Lokasi</td>
                        <td>{{number_format($am2->sum('pagu'))}}</td>
                    </tr>
                    <tr>
                        <td>Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</td>
                        <td>{{$am3->count()}} Lokasi</td>
                        <td>{{number_format($am3->sum('pagu'))}}</td>
                    </tr>
                    <tr>
                        <td>Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</td>
                        <td>{{$sandak->count()}} Lokasi</td>
                        <td>{{number_format($sandak->sum('pagu'))}}</td>
                    </tr>
                    <tr>
                        <td>Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala Permukiman</td>
                        <td>{{$mck->count()}} Lokasi</td>
                        <td>{{number_format($mck->sum('pagu'))}}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
{{-- <script>
    jQuery.ajax({
        url : '/js/ams-rup-2022.json',
        type : "GET",
        dataType : "json",
        success:function(data) {
            // console.log(data.aaData[0][1]);
            // $(tes).html(data.aaData[0][1]);   
            jQuery.each(data.aaData, function(key,value){
            console.log(value[3]);
            // $(tes).html(value[2]);
            // $($('#tes')).append('<p>"'+ value[2] +'"</p>');
   
            })
        }
    })
</script> --}}
@stop