<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <style>
        .portfolio-menu {
            text-align: center;
        }

        .portfolio-menu ul li {
            display: inline-block;
            margin: 0;
            list-style: none;
            padding: 10px 15px;
            cursor: pointer;
            -webkit-transition: all 05s ease;
            -moz-transition: all 05s ease;
            -ms-transition: all 05s ease;
            -o-transition: all 05s ease;
            transition: all .5s ease;
        }

        .portfolio-item {
            /*width:100%;*/
        }

        .portfolio-item .item {
            /*width:303px;*/
            float: left;
            margin-bottom: 10px;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php
                                                $pagu = 'Rp' . number_format($pagu, 2, ',', '.');
                                            ?>
                                            <?php echo e($pagu ?: 'Data Belum Diinput'); ?>

                                        </div>
                                        <div class="text-muted">
                                            Pagu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php if(!is_null($tfl->pekerjaan->detail)): ?>
                                                <?php
                                                    $kontrak = 'Rp' . number_format($tfl->pekerjaan->detail->harga_kontrak, 2, ',', '.');
                                                ?>
                                            <?php endif; ?>
                                            <?php echo e($kontrak ?? 'Nilai Belum Diinput'); ?>

                                        </div>
                                        <div class="text-muted">
                                            Nilai Kontrak
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php echo e($days ?? 'Data Belum Diinput'); ?>

                                        </div>
                                        <div class="text-muted">
                                            Masa Pelaksanaan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Ringkasan</h3>
                        <span>Nomor Kontrak: <?php echo e($tfl->pekerjaan->detail->no_spk ?? 'Data Belum Diinput'); ?></span> <br>
                        <span>Pelaksana: <?php echo e($tfl->pekerjaan->detail->nama_pelaksana ?? 'Data Belum Diinput'); ?></span> <br>
                        <span>Mulai:
                            <?php if(is_null($tfl->pekerjaan->detail)): ?>
                                Data Belum Diinput
                            <?php else: ?>
                            <?php echo e(date('j F, Y', strtotime($tfl->pekerjaan->detail->tgl_mulai))); ?>

                            <?php endif; ?>
                        </span><br>
                        <span>Selesai:
                            <?php if(is_null($tfl->pekerjaan->detail)): ?>
                                Data Belum Diinput
                            <?php else: ?>
                            <?php echo e(date('j F, Y', strtotime($tfl->pekerjaan->detail->tgl_mulai ?? 'data belum diinput'))); ?>    
                            <?php endif; ?>
                        </span><br>
                        <span>
                            Output:
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">Upload Dokumen</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo e($tfl->pekerjaan->desa->n_desa); ?> - <?php echo e($tfl->pekerjaan->kec->n_kec); ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Foto Pelaksanaan</h3>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-sm">Upload Foto</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="btn-group w-100 mb-2">
                            <a class="btn btn-dark active" href="javascript:void(0)" data-filter="all"> Semua </a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="0">0%</a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="50">50%</a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="75">75%</a>
                            <a class="btn btn-dark" href="javascript:void(0)" data-filter="100">100%</a>
                        </div>
                        <div class="filter-container">
                            <?php $__currentLoopData = $foto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="filtr-item col-sm-2" data-category="<?php echo e($f->progress); ?>">
                                    <a href="<?php echo e($f->path); ?>" class="fancylight popup-btn" data-fancybox-group="light">
                                        <img class="img-fluid" src="<?php echo e($f->path); ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/filterizr/jquery.filterizr.min.js"></script>
    <script>
        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
        $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/pages/tfl/info.blade.php ENDPATH**/ ?>