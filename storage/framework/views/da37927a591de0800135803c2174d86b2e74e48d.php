<?php $__env->startSection('title', 'Realisasi Kontrak'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Realisasi Kontrak</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Bidang Air Minum dan Sanitasi Tahun Anggaran 2022</h3>
      <div class="card-tools">
        <a href="<?php echo e(route('realisasi.tambah')); ?>"><button class="btn btn-primary">Tambah</button></a>
      </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>No</th>
                <th>Nomor Kontrak</th>
                <th>NPHD</th>
                <th>BAST</th>
                <th>Jumlah SP2D</th>
                <th>Nomor SP2D</th>
                <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $i = 1;
              ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($i++); ?></td>
                <td><a href="/pekerjaan/<?php echo e($item->kontrak->pekerjaan_id); ?>"><?php echo e($item->kontrak->no_spk); ?></a> </td>
                <td><?php echo e($item->no_nphd); ?></td>
                <td><?php echo e($item->no_bast); ?></td>
                <?php
                $sp2d = "Rp" . number_format($item->jumlah_sp2d,2,',','.');
                ?>
                <td><?php echo e($sp2d); ?></td>
                <td><?php echo e($item->no_sp2d); ?></td>
                <td>
                  <a href="<?php echo e(route('kontrak.edit', $item->id)); ?>">
                    <button class="btn btn-primary btn-xs" type="button">
                       <i class="fas fa-cog"></i>         
                    </button>
                  </a>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-original-title="test" data-target="#exampleModal<?php echo e($item->id); ?>"><i class="fas fa-trash"></i></button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4 ]
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
<?php if(session()->has('pesan')): ?>  
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
          title: '<?php echo e(session()->get('pesan')); ?>'
        });
    });
    </script>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/halaman/realisasi/index.blade.php ENDPATH**/ ?>