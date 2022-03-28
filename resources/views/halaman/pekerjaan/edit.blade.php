@extends('adminlte::page')

@section('title', $pekerjaan->nama_pekerjaan)

@section('content_header')
    <h2>{{$pekerjaan->nama_pekerjaan}} <a href="">Detail</a></h2>
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
        <form action="{{route('pekerjaan.update', $pekerjaan->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kegiatan</label>
                {{-- {{dd($pekerjaan)}} --}}
                <select name="program_id" id="program_id" class="form-control select2" style="width: 100%;">
                    {{-- <option selected="{{$pekerjaan->program_id}}">{{$pekerjaan->kegiatan->sub_kegiatan}}</option> --}}
                    @foreach ($keg as $key => $value)
                    <option value="{{$value->id}}" {{ $value->id == $pekerjaan->program_id ? 'selected' : '' }}>{{$value->sub_kegiatan}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_pekerjaan">Nama Pekerjaan</label>
                <input value="{{$pekerjaan->nama_pekerjaan}}" type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" placeholder="Input nama pekerjaan">
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <select id="kecamatan_id" name="kecamatan_id" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kec as $key => $value)
                    <option value="{{$value->id}}" {{ $value->id == $pekerjaan->kecamatan_id ? 'selected' : '' }}>{{$value->n_kec}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="desa_id">Desa</label>
                <select value="" name="desa_id" id="desa_id" class="form-control select2" style="width: 100%;">
                  <option value="{{$pekerjaan->desa_id}}" {{ $pekerjaan->desa_id == $pekerjaan->desa_id ? 'selected' : '' }}>{{$pekerjaan->desa->n_desa}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Pagu">Pagu</label>
                <input value="{{$pekerjaan->pagu}}" type="text" class="form-control" id="pagu" name="pagu" data-type="currency" id="currency-field" placeholder="Input Pagu">
            </div>
            <div class="form-group">
              <label for="tahun_anggaran">Tahun Anggaran</label>
              <select name="tahun_anggaran" id="tahun_anggaran" class="form-control select2">
                <option value="2022">2022</option>
                <option value="2021">2021</option>
              </select>
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
                   jQuery($('#kecamatan_id')).on('change',function(){
                       var KecID = jQuery(this).val();
                       if(KecID)
                       {
                           jQuery.ajax({
                               url : '/desa/' +KecID,
                               type : "GET",
                               dataType : "json",
                               success:function(data)
                               {
                                   console.log(data);
                                   jQuery($('#desa_id')).empty();
                                   jQuery.each(data, function(key,value){
                                   $($('#desa_id')).append('<option value="'+ key +'">'+ value +'</option>');
                                   });
                               }
                           });
                       }
                       else
                       {
                           $($('#desa_id')).empty();
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