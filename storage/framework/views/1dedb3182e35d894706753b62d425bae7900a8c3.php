<?php $__env->startSection('title', 'Tambah Data Penyedia'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Tambah Data Penyedia</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bidang Air Minum dan Sanitasi</h3>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('penyedia.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/halaman/penyedia/tambah.blade.php ENDPATH**/ ?>