<?php $__env->startSection('title', 'Detail Pekerjaan'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Detail Pekerjaan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail <?php echo e($pekerjaan->nama_pekerjaan ?: 'Data Belum Diinput'); ?></h3>
        <div class="card-tools">
            <?php if($pekerjaan->detail != null): ?>
                <button class="btn btn-warning btn-xs">Ubah Detail</button>
            <?php else: ?>
                
                <a href="/foto/pekerjaan/<?php echo e($pekerjaan->id); ?>"><button class="btn btn-warning btn-xs">Upload Foto</button></a>
            <?php endif; ?>

        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Pagu</span>
                                <?php
                                $pagu = "Rp" . number_format($pekerjaan->pagu,2,',','.');
                                ?>
                                <span class="info-box-number text-center text-muted mb-0"><?php echo e($pagu ?: 'Data Belum Diinput'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Harga Kontrak</span>
                                <?php if(!is_null($pekerjaan->detail)): ?>
                                <?php
                                $kontrak = "Rp" . number_format($pekerjaan->detail->harga_kontrak,2,',','.');
                                ?>
                                <?php endif; ?>

                                <span class="info-box-number text-center text-muted mb-0"><?php echo e($kontrak ?? 'Data Belum Diinput'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Masa Pelaksanaan</span>
                                <span class="info-box-number text-center text-muted mb-0"><?php echo e($days ?? 'Data Belum Diinput'); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>Detail Pengadaan</h4>
                            <div class="post">
                                <div class="user-block">
                                   <p>Nomor SPK: <b><?php echo e($pekerjaan->detail->no_spk ?? 'Data Belum Diinput'); ?></b></p>
                                   <p>Tanggal SPK: <b><?php echo e($pekerjaan->detail->tgl_spk ?? 'Data Belum Diinput'); ?></b></p>
                                </div>
                                <p>Mulai: <b><?php echo e($pekerjaan->detail->tgl_mulai ?? 'Data Belum Diinput'); ?></b></p>
                                <p>Selesai: <b><?php echo e($pekerjaan->detail->tgl_selesai ?? 'Data Belum Diinput'); ?></b></p>
                            </div>
                    <div class="post clearfix">
                        <div class="user-block">
                            <?php if(!is_null($pekerjaan->detail)): ?>
                            <p>Nomor NPHD: <?php echo e($pekerjaan->detail->realisasi->no_nphd); ?></p>
                            <p>Tanggal NPHD: <?php echo e($pekerjaan->detail->realisasi->tgl_nphd); ?></p>
                            <?php else: ?>
                            <p>Nomor dan Tangggal NPHD Belum Diinput</p>
                            <?php endif; ?>
                        </div>
                        <?php if(!is_null($pekerjaan->detail)): ?>
                        <p>Nomor Berita Acara Serah Terima: <?php echo e($pekerjaan->detail->realisasi->no_bast); ?></p>
                        <p>Tanggal Berita Acara Serah Terima: <?php echo e($pekerjaan->detail->realisasi->tgl_bast); ?></p>
                        <?php else: ?>
                        <p>Nomor dan Tangggal Berita Acara Serah Terima Belum Diinput</p>
                        <?php endif; ?>
                    </div>
                    <div class="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title">Foto Progress Fisik</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="btn-group w-100 mb-2">
                                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Semua </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="0">0%</a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="50">50%</a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="75">70%</a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="100">100%</a>
                                            </div>
                                            <div class="filter-container p-0 row">
                                                <?php $__currentLoopData = $foto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="filtr-item col-sm-2" data-category="<?php echo e($f->progress); ?>" data-sort="<?php echo e($pekerjaan->nama_pekerjaan); ?>">
                                                <a href="<?php echo e($f->path); ?>" data-toggle="lightbox" data-title="<?php echo e($pekerjaan->nama_pekerjaan); ?> - <?php echo e($f->progress); ?>%">
                                                <img src="<?php echo e($f->path); ?>" class="img-fluid mb-2" alt="white sample" />
                                                </a>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><?php echo e($pekerjaan->kegiatan->program ?? 'Data Belum Diinput'); ?></h3>
                    <p class="text-muted"><?php echo e($pekerjaan->nama_pekerjaan ?? 'Data Belum Diinput'); ?></p>
                    <p class="text-muted">Desa <?php echo e($pekerjaan->desa->n_desa ?? 'Data Belum Diinput'); ?> Kecamatan <?php echo e($pekerjaan->kec->n_kec ?: 'Data Belum Diinput'); ?></p>
                    <br>
                    <div class="text-muted">
                    <p class="text-sm">Nama CV/PT/KSM
                    <b class="d-block"><?php echo e($pekerjaan->detail->nama_pelaksana ?? 'Data Belum Diinput'); ?></b>
                    </p>
                    <p class="text-sm">Pengawas Lapangan
                    <b class="d-block"><?php echo e($pekerjaan->detail->nama_pengawas ?? 'Data Belum Diinput'); ?></b>
                    </p>
                </div>
                    <h5 class="mt-5 text-muted">Dokumen Pekerjaan</h5>
                    <ul class="list-unstyled">
                    <?php $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>                         
                    <a href="<?php echo e($dok->path); ?>" class="btn-link text-secondary"><i class="fas fa-copy"></i> <?php echo e($dok->file); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </ul>
                <div class="text-center mt-5 mb-3">
                    <a href="#" class="btn btn-sm btn-primary">Add files</a>
                    <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/filterizr/jquery.filterizr.min.js"></script>
<script>
      $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/halaman/pekerjaan/detail.blade.php ENDPATH**/ ?>