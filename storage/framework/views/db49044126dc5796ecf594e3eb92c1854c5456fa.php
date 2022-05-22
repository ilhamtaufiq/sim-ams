<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Dashboard</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Default</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="col-xl-12 xl-100 dashboard-sec box-col-12">
		<div class="card earning-card">
			<div class="card-body p-0">
				<div class="row m-0">
					<div class="col-xl-3 earning-content p-0">
						<div class="row m-0 chart-left">
							<div class="col-xl-12 p-0 left_side_earning">
								<h5>Dashboard</h5>
								<p class="font-roboto">Tahun Anggaran 2022</p>
							</div>
							<div class="col-xl-12 p-0 left_side_earning">
								<h5><?php echo e($pagu); ?></h5>
								<p class="font-roboto">Jumlah Pagu</p>
							</div>
							<div class="col-xl-12 p-0 left_side_earning">
								<h5><?php echo e($total_kontrak); ?></h5>
								<p class="font-roboto">Jumlah Nilai Kontrak</p>
							</div>
							<div class="col-xl-12 p-0 left_side_earning">
								<h5><?php echo e($realisasi); ?>%</h5>
								<p class="font-roboto">Realisasi</p>
							</div>
							<div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/pages/dashboard.blade.php ENDPATH**/ ?>