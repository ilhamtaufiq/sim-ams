@extends('adminlte::page')

@section('title', 'Tambah Data Penyedia')

@section('content_header')
    <h1>Tambah Data Penyedia</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bidang Air Minum dan Sanitasi</h3>
    </div>
    <div class="card-body">
        <form action="{{route('penyedia.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Penyedia</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input nama penyedia">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input alamat penyedia">
            </div>
            <div class="form-group">
                <label for="alamat">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Input nomor telepon penyedia">
            </div>
            <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Input NPWP penyedia">
            </div>
            <div class="form-group">
                <label for="">SBU</label>
                <input type="file" name="sbu" class="form-control" accept="*">
            </div>
            <div class="form-group">
                <label for="">IUJK</label>
                <input type="file" name="iujk" class="form-control" accept="*">
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
@if($errors->any())
<script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
        timer: 4000
      });
      Toast.fire({
          type: 'error',
          title: '{!! implode('', $errors->all(':message </br>')) !!}'
        });
    });
</script>
@endif
@stop