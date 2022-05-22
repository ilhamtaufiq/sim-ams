@extends('layouts.simple.master')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
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
								<h5>{{$pagu}}</h5>
								<p class="font-roboto">Jumlah Pagu</p>
							</div>
							<div class="col-xl-12 p-0 left_side_earning">
								<h5>{{$total_kontrak}}</h5>
								<p class="font-roboto">Jumlah Nilai Kontrak</p>
							</div>
							<div class="col-xl-12 p-0 left_side_earning">
								<h5>{{$realisasi}}%</h5>
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

@endsection

@section('script')
<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection
