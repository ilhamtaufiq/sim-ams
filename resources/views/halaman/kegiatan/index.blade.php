@extends('adminlte::page')

@section('title', 'Daftar Kegiatan')

@section('content_header')
    <h1>Daftar Kegiatan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Bidang Air Minum dan Sanitasi Tahun Anggaran 2022</h3>
    </div>
    
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Program</th>
                <th>Kegiatan</th>
                <th>Sub Kegiatan</th>
                <th>Sumber Dana</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                <td>{{$item->program}}</td>
                <td>{{$item->kegiatan}}</td>
                <td>{{$item->sub_kegiatan}}</td>
                <td>{{$item->sumber_dana}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@stop