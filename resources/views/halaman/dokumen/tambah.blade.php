@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('dokumen.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Nama Pekerjaan</label>
              <select name="pekerjaan_id" id="pekerjaan_id" class="form-control select2">
                @foreach ($pekerjaan as $item)
                  <option value="{{$item->id}}">{{$item->nama_pekerjaan}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Files</label>
              <input type="file" name="files[]" class="form-control" accept="*" multiple>
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Tambah Keterangan">
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