<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xl">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Kegiatan</h3>
          </div>
          <div class="card-body">
          <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Program</th>
                    <th>Kegiatan</th>
                    <th>Progress Fisik</th>
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
                    $number = $item->pekerjaan->pagu;
                    $pagu = "Rp" . number_format($number,2,',','.');
                    ?>
                    <tr>
                      <td><?php echo e($i++); ?></td>
                    <td><?php echo e($item->pekerjaan->kegiatan->sub_kegiatan); ?></td>
                    <td><?php echo e($item->pekerjaan->nama_pekerjaan); ?></td>
                    <td>
                      <div class="progress mb-2">
                        <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" aria-label="100% Complete">
                        <span>38% Complete</span> 
                      </div>
                      </div>
                    </td>
                    <td><?php echo e($item->pekerjaan->tahun_anggaran); ?></td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-team<?php echo e($item->pekerjaan->id); ?>">
                                  Dokumentasi Foto
                                </a>
                                <a class="dropdown-item" href="#">
                                  Informasi Kegiatan
                                </a>
                              </div>
                            </div>
                          </div>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal modal-blur fade" id="modal-team<?php echo e($d->pekerjaan->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="/foto/pekerjaan/post" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo e($d->pekerjaan->nama_pekerjaan); ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row mb-3 align-items-end">
                <div class="col-auto">
                  <a href="#" class="avatar avatar-upload rounded">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <span class="avatar-upload-text">
                    <img id="prev" src="#" alt="your image" />
                    </span>
                  </a>
                </div>
                <div class="col">
                  <label class="form-label">Foto</label>
                  <input name="images[1]" type="file" id="img" class="form-control" />
                  <input value="<?php echo e($d->pekerjaan->id); ?>" type="text" name="pekerjaan_id" id="pekerjaan_id" hidden>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Progress</label>
                <div class="row g-2">
                  <div class="col-auto">
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" name="progress[1]" value="0" type="radio">
                      <span class="form-check-label">0%</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" name="progress[1]" value="25" type="radio">
                      <span class="form-check-label">25%</span>
                    </label>
                  </div>
                </div>
              </div>
              <div>
                <label class="form-label">Keterangan</label>
                <textarea class="form-control"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Upload</button>
            </div>
          </div>
      </form>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
  img.onchange = evt => {
  const [file] = img.files
  if (file) {
    prev.src = URL.createObjectURL(file)
  }
}
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--Data Table-->
<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

<!--Export table buttons-->
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
<script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
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
        ]
    } );
} );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/tfl/home.blade.php ENDPATH**/ ?>