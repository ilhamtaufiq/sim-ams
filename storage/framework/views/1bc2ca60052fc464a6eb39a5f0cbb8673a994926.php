<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="card-header">
            <h4>Ringkasan Pekerjaan Bidang Air Minum dan Sanitasi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Rp<?php echo e($pagu); ?></h3>
                            
                            <p>Total Pagu</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo e($total_pekerjaan); ?></h3>
                            <p>Total Pekerjaan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="card-header border-transparent">
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table m-0">
                <thead>
                    <tr>
                    <th>Kegiatan</th>
                    <th>Pekerjaan</th>
                    <th>Pagu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</td>
                        <td><?php echo e($am1->count()); ?> Lokasi</td>
                        <td><?php echo e(number_format($am1->sum('pagu'))); ?></td>
                    </tr>
                    <tr>
                        <td>Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</td>
                        <td><?php echo e($am2->count()); ?> Lokasi</td>
                        <td><?php echo e(number_format($am2->sum('pagu'))); ?></td>
                    </tr>
                    <tr>
                        <td>Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</td>
                        <td><?php echo e($am3->count()); ?> Lokasi</td>
                        <td><?php echo e(number_format($am3->sum('pagu'))); ?></td>
                    </tr>
                    <tr>
                        <td>Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</td>
                        <td><?php echo e($sandak->count()); ?> Lokasi</td>
                        <td><?php echo e(number_format($sandak->sum('pagu'))); ?></td>
                    </tr>
                    <tr>
                        <td>Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala Permukiman</td>
                        <td><?php echo e($mck->count()); ?> Lokasi</td>
                        <td><?php echo e(number_format($mck->sum('pagu'))); ?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/dashboard.blade.php ENDPATH**/ ?>