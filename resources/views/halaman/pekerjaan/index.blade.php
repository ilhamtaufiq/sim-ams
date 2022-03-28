@extends('adminlte::page')

@section('title', 'Daftar Pekerjaan')

@section('content_header')
    <h1>Daftar Pekerjaan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Bidang Air Minum dan Sanitasi Tahun Anggaran 2022</h3>
      <div class="card-tools">
        <a href="{{route('pekerjaan.tambah')}}"><button class="btn btn-primary">Tambah</button></a>
      </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                <th>Program</th>
                <th>Pekerjaan</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Pagu</th>
                <th>Tahun Anggaran</th>
                <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach($data as $item)
                @php
                $number = $item->pagu;
                $pagu = "Rp" . number_format($number,2,',','.');
                @endphp
                <tr style="background-color:{{ $item->aspirasi == 1 ? 'aqua;' : ''; }}">
                  <td>{{$i++}}</td>
                <td>{{$item->kegiatan->sub_kegiatan}}</td>
                <td>{{$item->nama_pekerjaan}}</td>
                <td>{{$item->kec->n_kec}}</td>
                <td>{{$item->desa->n_desa}}</td>
                <td>{{$pagu}}</td>
                <td>{{$item->tahun_anggaran}}</td>
                <td>
                  <a href="{{ route('pekerjaan.detail', $item->id) }}">
                    <button class="btn btn-success btn-xs" type="button">
                      <i class="fas fa-info"></i>         
                    </button>
                  </a>
                  <a href="{{ route('pekerjaan.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs" type="button">
                       <i class="fas fa-cog"></i>         
                    </button>
                  </a>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-original-title="test" data-target="#exampleModal{{$item->id}}"><i class="fas fa-trash"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($data as $d)
      <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                 </div>
                 <div class="modal-body">Apakah Anda yakin akan menghapus data {{$d->nama_pekerjaan}}?</div>
                 <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <form action="{{ route('pekerjaan.destroy', $d->id)}}" method="post">
                     @method('DELETE')
                     @csrf
                     <input class="btn btn-danger" type="submit" value="Hapus" />
                  </form>            
                 </div>
              </div>
           </div>
        </div>
      @endforeach
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4]
                }
            },
            {
              extend: 'print',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            'colvis'
        ]
    } );
} );
  </script>
@if(session()->has('pesan'))  
<script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      Toast.fire({
          type: 'success',
          title: '{{ session()->get('pesan') }}'
        });
    });
    </script>
  @endif
@stop