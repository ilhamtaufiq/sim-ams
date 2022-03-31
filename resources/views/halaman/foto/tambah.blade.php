@extends('adminlte::page')

@section('title', 'Upload Foto-Foto')

@section('content_header')
    <h1>Bulk Upload</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bidang Air Minum dan Sanitasi Tahun Anggaran 2022</h3>
    </div>
    <div class="card-body">
        <form action="{{route('foto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Program</label>
                <select name="program_id" id="program_id" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Program/Kegiatan/Sub Kegiatan</option>
                    <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                    <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala Permukiman</option>
                    <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>

                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan_id">Pekerjaan</label>
                <select value="" name="pekerjaan_id" id="pekerjaan_id" class="form-control select2" style="width: 100%;">
                <option value="">Pilih Pekerjaan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                @if ($errors->has('files'))
                  @foreach ($errors->get('files') as $error)
                  <span>
                      <strong>{{ $error }}</strong>
                  </span>
                  @endforeach
                @endif
            </div>
            <div class="card-footer">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
    </script>
    <script>
      jQuery(document).ready(function (){
        jQuery($('#pagu')).on('change',function(){
          var pagu = jQuery(this).val();
          $($('#harga_kontrak')).val(pagu.replace(/\D/g, ""));

        })

      })
        jQuery(document).ready(function (){
                   jQuery($('#program_id')).on('change',function(){
                       var kegID = jQuery(this).val();
                       if(kegID)
                       {
                           jQuery.ajax({
                               url : '/pekerjaan/kegiatan/' +kegID,
                               type : "GET",
                               dataType : "json",
                               success:function(data)
                               {
                                   console.log(data);
                                   jQuery($('#pekerjaan_id')).empty();
                                   jQuery.each(data, function(key,value){
                                   if(value.detail != null){    
                                    jQuery($('#pekerjaan_id')).empty();
                                   }else{
                                    $($('#pekerjaan_id')).append('<option value="'+ value.id +'">'+ value.nama_pekerjaan +'</option>');
                                    // $($('#pagu')).val(value.pagu);
                                   }
                                   });
                               }
                           });
                       }
                       else
                       {
                           $($('#pekerjaan_id')).empty();
                       }
                   });
    });
    </script>
@stop