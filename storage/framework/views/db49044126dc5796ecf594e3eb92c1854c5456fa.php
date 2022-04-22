<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Pagu</div>
              </div>
              <div class="h1 mb-3"><?php echo e($pagu); ?></div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Total Kegiatan</div>
              </div>
              <div class="d-flex align-items-baseline">
                <div class="h1 mb-0 me-2"><?php echo e($total_pekerjaan); ?> Kegiatan</div>
              </div>
            </div>
            <div id="chart-revenue-bg" class="chart-sm"></div>
          </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kegiatan Tahun Anggaran 2022</h3>
              </div>
              <div class="card-table table-responsive">
                <table class="table table-vcenter">
                  <thead>
                    <tr>
                      <th>Kegiatan</th>
                      <th>Total</th>
                      <th>Pagu</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>
                        Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                    </td>
                    <td class="text-muted"><?php echo e($am1->count()); ?></td>
                    <td class="text-muted"><?php echo e(number_format($am1->sum('pagu'))); ?></td>
                    <td class="text-end w-1">
                      <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-1"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                    </td>
                    <td class="text-muted"><?php echo e($am2->count()); ?></td>
                    <td class="text-muted"><?php echo e(number_format($am2->sum('pagu'))); ?></td>
                    <td class="text-end w-1">
                      <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-2"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                    </td>
                    <td class="text-muted"><?php echo e($am3->count()); ?></td>
                    <td class="text-muted"><?php echo e(number_format($am3->sum('pagu'))); ?></td>
                    <td class="text-end w-1">
                      <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-3"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat
                    </td>
                    <td class="text-muted"><?php echo e($sandak->count()); ?></td>
                    <td class="text-muted"><?php echo e(number_format($sandak->sum('pagu'))); ?></td>
                    <td class="text-end w-1">
                      <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-4"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala Permukiman
                    </td>
                    <td class="text-muted"><?php echo e($mck->count()); ?></td>
                    <td class="text-muted"><?php echo e(number_format($mck->sum('pagu'))); ?></td>
                    <td class="text-end w-1">
                      <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-5"></div>
                    </td>
                  </tr>
                  
                </table>
              </div>
            </div>
          </div>
        
        
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/pages/dashboard.blade.php ENDPATH**/ ?>