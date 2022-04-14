<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($pekerjaan->nama_pekerjaan); ?></h3>
    </div>
    <div class="card-body">
        <form action="/foto/pekerjaan/post" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <input value="<?php echo e($pekerjaan->id); ?>" type="text" name="pekerjaan_id" id="pekerjaan_id" hidden>
                </select>
            </div>
            <div class="form-group">
              <label for="">Foto 0%</label>
              <input name="progress[1]" id="progress[1]" type="numeric" value="0" hidden>
              <input type="file" name="images[1]" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
              <label for="">Foto 50%</label>
              <input name="progress[2]" id="progress[2]" type="numeric" value="50" hidden>
              <input type="file" name="images[2]" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
              <label for="">Foto 75%</label>
              <input name="progress[3]" id="progress[3]" type="numeric" value="75" hidden>
              <input type="file" name="images[3]" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
              <label for="">Foto 100%</label>
              <input name="progress[4]" id="progress[4]" type="numeric" value="100" hidden>
              <input type="file" name="images[4]" class="form-control" accept="image/*">
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php if($errors->any()): ?>
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
          title: '<?php echo implode('', $errors->all(':message </br>')); ?>'
        });
    });
    </script>
  <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/halaman/foto/progress.blade.php ENDPATH**/ ?>