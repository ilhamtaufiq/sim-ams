<?php $__env->startSection('title', 'Daftar Pekerjaan'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Daftar Pekerjaan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Bidang Air Minum dan Sanitasi Tahun Anggaran 2022</h3>
      <div class="card-tools">
        <a href="<?php echo e(route('pekerjaan.tambah')); ?>"><button class="btn btn-primary">Tambah</button></a>
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
              <?php
                  $i = 1;
              ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $number = $item->pagu;
                $pagu = "Rp" . number_format($number,2,',','.');
                ?>
                <tr style="background-color:<?php echo e($item->aspirasi == 1 ? 'aqua;' : ''); ?>">
                  <td><?php echo e($i++); ?></td>
                <td><?php echo e($item->kegiatan->sub_kegiatan); ?></td>
                <td><?php echo e($item->nama_pekerjaan); ?></td>
                <td><?php echo e($item->kec->n_kec); ?></td>
                <td><?php echo e($item->desa->n_desa); ?></td>
                <td><?php echo e($pagu); ?></td>
                <td><?php echo e($item->tahun_anggaran); ?></td>
                <td>
                  <a href="<?php echo e(route('pekerjaan.detail', $item->id)); ?>">
                      <i class="fas fa-info"></i>         
                  </a>
                  <a href="<?php echo e(route('pekerjaan.edit', $item->id)); ?>">
                       <i class="fas fa-cog"></i>         
                  </a>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-original-title="test" data-target="#exampleModal<?php echo e($item->id); ?>"><i class="fas fa-trash"></i></button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="modal fade" id="exampleModal<?php echo e($d->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                 </div>
                 <div class="modal-body">Apakah Anda yakin akan menghapus data <?php echo e($d->nama_pekerjaan); ?>?</div>
                 <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <form action="<?php echo e(route('pekerjaan.destroy', $d->id)); ?>" method="post">
                     <?php echo method_field('DELETE'); ?>
                     <?php echo csrf_field(); ?>
                     <input class="btn btn-danger" type="submit" value="Hapus" />
                  </form>            
                 </div>
              </div>
           </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/halaman/pekerjaan/index.blade.php ENDPATH**/ ?>