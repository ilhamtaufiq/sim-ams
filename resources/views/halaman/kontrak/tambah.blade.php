@extends('adminlte::page')

@section('title', 'Tambah Data Kontrak')

@section('content_header')
    <h1>Tambah Data Kontrak</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bidang Air Minum dan Sanitasi Tahun Anggaran 2022</h3>
            {{-- @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif --}}

    </div>
    <div class="card-body">
        <form action="{{route('kontrak.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Pekerjaan</label>
                <select name="program_id" id="program_id" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Program/Kegiatan/Sub Kegiatan</option>
                    <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                    <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala Permukiman</option>
                    <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                    <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                    <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>

                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan_id">Pekerjaan</label>
                <select value="" name="pekerjaan_id" id="pekerjaan_id" class="form-control select2" style="width: 100%;">
                <option value="">Pilih Pekerjaan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga_kontrak">Harga Kontrak</label>
                <input type="text" class="form-control" name="pagu" id="pagu" data-type="currency" id="currency-field" placeholder="Harga Kontrak">
                <input value="" type="numeric" class="form-control" id="harga_kontrak" name="harga_kontrak" hidden>
            </div>
            <div class="form-group">
                <label for="no_spk">Nomor SPK</label>
                <input type="text" class="form-control" id="no_spk" name="no_spk" placeholder="Nomor SPK">
            </div>
            <div class="form-group">
                <label for="tgl_spk">Tanggal SPK</label>
                <input type="date" class="form-control" id="tgl_spk" name="tgl_spk" placeholder="Tanggal SPK">
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai">
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai">
            </div>
            <div class="form-group">
                <label for="nama_pelaksana">Nama Pelaksana</label>
                <input type="text" class="form-control" id="nama_pelaksana" name="nama_pelaksana" placeholder="Nama Pelaksana">
            </div>
            <div class="form-group">
                <label for="nama_pengawas">Nama Pengawas</label>
                <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas" placeholder="Nama Pengawas">
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
    <script>
        $("input[data-type='currency']").on({
      keyup: function() {
        formatCurrency($(this));
      },
      blur: function() { 
        formatCurrency($(this), "blur");
      }
  });
  
  
  function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
  }
  
  
  function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;
  
    // initial caret position 
    var caret_pos = input.prop("selectionStart");
      
    // check for decimal
    if (input_val.indexOf(",") >= 0) {
  
      // get position of first decimal
      // this prevents multiple decimals from
      // being entered
      var decimal_pos = input_val.indexOf(".");
  
      // split number by decimal point
      var left_side = input_val.substring(0, decimal_pos);
      var right_side = input_val.substring(decimal_pos);
  
      // add commas to left side of number
      left_side = formatNumber(left_side);
  
      // validate right side
      right_side = formatNumber(right_side);
      
      // On blur make sure 2 numbers after decimal
      if (blur === "blur") {
        right_side += "00";
      }
      
      // Limit decimal to only 2 digits
      right_side = right_side.substring(0, 2);
  
      // join number by .
      input_val = "Rp" + left_side + "." + right_side;
  
    } else {
      // no decimal entered
      // add commas to number
      // remove all non-digits
      input_val = formatNumber(input_val);
      input_val = "Rp" + input_val;
      
      // final formatting
      if (blur === "blur") {
        input_val += ",00";
      }
    }
    
    // send updated string to input
    input.val(input_val);
  
    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
  }
</script>
@stop