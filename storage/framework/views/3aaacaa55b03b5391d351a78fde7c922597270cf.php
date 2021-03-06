
<?php $__env->startSection('title', 'Detail'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/photoswipe.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/mapsjs-ui.css')); ?>">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <style>
        #map {
            height: 300px;
        }

        #mapid {
            height: 300px;
        }

    </style>
    <script src="<?php echo e(asset('js')); ?>/getloc.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Detail</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div>
            <div class="row product-page-main p-0">
                <div class="col-xl-4 xl-cs-65 box-col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-slider owl-carousel owl-theme" id="sync1">
                                <?php $__currentLoopData = $foto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item"><img src="<?php echo e($f->path); ?>" alt=""></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="owl-carousel owl-theme" id="sync2">
                                <?php $__currentLoopData = $foto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item"><img src="<?php echo e($f->path); ?>" alt=""></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 xl-100 box-col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-page-details">
                                <h4><?php echo e($title); ?></h4>
                            </div>
                            <hr>
                            <div>
                                <table class="product-page-width">
                                    <tbody>
                                        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                                        <tr>
                                            <td> <b>Pagu</b></td>
                                            <?php
                                                $pagu = 'Rp' . number_format($pagu, 2, ',', '.');
                                            ?>
                                            <td><?php echo e($pagu ?: 'Data Belum Diinput'); ?></td>
                                        </tr>
                                        <tr>
                                            <td> <b>Kontrak</b></td>
                                            <?php if(!is_null($tfl->pekerjaan->detail)): ?>
                                                <?php
                                                    $kontrak = 'Rp' . number_format($tfl->pekerjaan->detail->harga_kontrak, 2, ',', '.');
                                                ?>
                                            <?php endif; ?>
                                            <td><?php echo e($kontrak ?? 'Nilai Belum Diinput'); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td><b>Output</b></td>
                                           <td> <?php $__currentLoopData = $tfl->pekerjaan->output; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <ul>
                                                <li><?php echo e($o->komponen); ?> - <?php echo e($o->volume); ?></li>
                                            </ul>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Realisasi :</b></td>
                                            <td> <?php $__currentLoopData = $tfl->pekerjaan->realisasi_output; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <ul>
                                                    <li><?php echo e($r->output->komponen); ?> - <?php echo e($r->realisasi); ?></li>
                                                </ul>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Progress</b></td>
                                            <td>
                                                <?php
                                                $total_output = $tfl->pekerjaan->output->sum('volume');
                                                $total_realisasi = $tfl->pekerjaan->realisasi_output->sum('realisasi');
                                                if ($total_output == 0) {
                                                    $progress_fisik = null;
                                                } else {
                                                $progress_fisik = ($total_realisasi / $total_output) * 100;
                                                }
                                                // $progress_fisik = ($total_realisasi / $total_output) * 100;

                                            ?>
                                            <?php echo e(number_format($progress_fisik)); ?>%
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="m-t-15">
                                <button class="btn btn-primary m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-foto"> <i class="fa fa-camera me-1"></i>Upload Foto</button>
                                <button class="btn btn-success m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-dokumen"> <i class="fa fa-file me-1"></i>Upload Dokumen</button>
                                <button class="btn btn-info m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-output"> <i class="fa fa-check me-1"></i>Output</button>
                                <button class="btn btn-info m-r-10" type="button" title="" data-bs-toggle="modal"
                                data-bs-target="#modal-realisasi"> <i class="fa fa-check me-1"></i>Realisasi</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 xl-cs-35 box-col-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- side-bar colleps block stat-->
                            <div class="collection-filter-block">
                                <ul class="pro-services">
                                    <li>
                                        <div class="media">
                                            <i data-feather="archive"></i>
                                            <div class="media-body">
                                                <h5>Nomor Kontrak </h5>
                                                <p><?php echo e($tfl->pekerjaan->detail->no_spk ?? 'Data Belum Diinput'); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="flag"></i>
                                            <div class="media-body">
                                                <h5>Pelaksana </h5>
                                                <p><?php echo e($pekerjaan->detail->nama_pelaksana ?? 'Data Belum Diinput'); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="calendar"></i>
                                            <div class="media-body">
                                                <h5>Mulai </h5>
                                                <p>
                                                    <?php if(is_null($tfl->pekerjaan->detail)): ?>
                                                        Data Belum Diinput
                                                    <?php else: ?>
                                                        <?php echo e(date('j F, Y', strtotime($tfl->pekerjaan->detail->tgl_mulai))); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="calendar"></i>
                                            <div class="media-body">
                                                <h5>Selesai </h5>
                                                <p>
                                                    <?php if(is_null($tfl->pekerjaan->detail)): ?>
                                                        Data Belum Diinput
                                                    <?php else: ?>
                                                        <?php echo e(date('j F, Y', strtotime($tfl->pekerjaan->detail->tgl_mulai ?? 'data belum diinput'))); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <i data-feather="clock"></i>
                                            <div class="media-body">
                                                <h5>Masa Pelaksanaan</h5>
                                                <p><?php echo e($days ?? 'Data Belum Diinput'); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="map-js-height" id="mapid"></div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
               <h5>IMAGE GALLERY</h5>
            </div>
            <div class="gallery my-gallery card-body row" itemscope="">
                <?php $__currentLoopData = $foto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                  <a href="<?php echo e($f->path); ?>" itemprop="contentUrl" data-size="300x300"><img class="img-thumbnail" src="<?php echo e($f->path); ?>" itemprop="thumbnail" alt="Image description"></a>
                  <figcaption itemprop="caption description">
                    <form action="<?php echo e(route('foto.hapus', $f->id)); ?>" method="post">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="col">
                            <button class="btn btn-danger w-100" type="submit">Hapus</button>
                        </div>
                    </form>
                  </figcaption>
               </figure>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Root element of PhotoSwipe. Must have class pswp.-->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="pswp__bg"></div>
               <div class="pswp__scroll-wrap">
                  <div class="pswp__container">
                     <div class="pswp__item"></div>
                     <div class="pswp__item"></div>
                     <div class="pswp__item"></div>
                  </div>
                  <div class="pswp__ui pswp__ui--hidden">
                     <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                           <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                 <div class="pswp__preloader__donut"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                     </div>
                     <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                     <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                     <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        </div>
    <div class="modal fade bd-example-modal-lg" id="modal-foto" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Foto</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="<?php echo e(route('foto.store')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <input type="text" value="<?php echo e($tfl->pekerjaan->id); ?>" name="pekerjaan_id" hidden>
                                        <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                                        <?php if($errors->has('files')): ?>
                                            <?php $__currentLoopData = $errors->get('files'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="invalid-feedback"><a
                                                        class="text-danger"><?php echo e($error); ?></a></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="">Koordinat</label>
                                    <div id="map"></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <button id="clickMe" class="btn btn-primary btn-toast" type="button">Tampilkan
                                    Lokasi</button>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" id="lat" name="lat" class="form-control" placeholder="Latitude">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="long" name="long" class="form-control"
                                        placeholder="Longtitude">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="">Keterangan</label>
                                        <textarea type="text" name="keterangan" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-dokumen" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Dokumen</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="<?php echo e(route('dokumen.post')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <input type="text" value="<?php echo e($tfl->pekerjaan->id); ?>" name="pekerjaan_id" hidden>
                                        <input type="text" value="<?php echo e($tfl->pekerjaan->nama_pekerjaan); ?>" name="nama_pekerjaan"
                                            hidden>
                                        <input type="file" name="files[]" multiple class="form-control" accept="*">
                                        <?php if($errors->has('files')): ?>
                                            <?php $__currentLoopData = $errors->get('files'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="invalid-feedback"><a
                                                        class="text-danger"><?php echo e($error); ?></a></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="">Keterangan</label>
                                        <textarea type="text" name="keterangan" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-output" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Ouput</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="/target/output" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Target Output</label>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="pekerjaan_id" value="<?php echo e($tfl->pekerjaan->id); ?>" hidden>
                                        <select name="komponen" id="komponen" class="form-control">
                                            <option value="Tangki Septik Komunal">Tangki Septik Komunal</option>
                                            <option value="Tangki Septik Individual">Tangki Septik Individual</option>
                                            <option value="Sambungan Rumah">Sambungan Rumah</option>
                                        </select>
                                        <label for="floating-input">Komponen</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="volume" type="number" class="form-control" id="floating-input" autocomplete="off">
                                        <label for="floating-input">Volume</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="satuan" type="text" class="form-control" id="floating-input" autocomplete="off">
                                        <label for="floating-input">Satuan</label>
                                    </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-realisasi" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Realisasi Ouput</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="<?php echo e(route('realisasi.output')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <?php
                                $i = 1;
                                ?>
                                <?php $__currentLoopData = $tfl->pekerjaan->output; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="form-label"><?php echo e($o->komponen); ?> - <?php echo e($o->id); ?></label>
                                    <div class="form-floating mb-3">
                                        <input name="pekerjaan_id" type="number" value="<?php echo e($tfl->pekerjaan->id); ?>" hidden>
                                        <input name="output_id[<?php echo e($i++); ?>]" type="number" value="<?php echo e($o->id); ?>" hidden>
                                        <input name="satuan[<?php echo e($i++); ?>]" type="text" value="<?php echo e($o->satuan); ?>" hidden>
                                        <input name="realisasi[]" type="numeric" class="form-control" autocomplete="off" required="">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo e(asset('js')); ?>/map.js"></script>

    <script src="<?php echo e(asset('assets/js/rating/jquery.barrating.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/rating-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.js')); ?>"></script>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        document.querySelector(".btn-toast").addEventListener('click', function() {
            Swal.fire({
                toast: true,
                html: '<ul id="status" class="progressing">' +
                    '</ul>',
                icon: 'info',
                title: 'Mencari titik Koordinat... (Izinkan Akses Data Lokasi)',
                position: 'top-end',
                showConfirmButton: false,
                timer: 12000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        });
    </script>
    <script>
        <?php $__currentLoopData = $foto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var informasi = `
     <p><?php echo e($data->keterangan); ?></p>
    `
            L.marker([<?php echo e($data->lat); ?>, <?php echo e($data->long); ?>])
                .addTo(mapid)
                .bindPopup(informasi);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\sim-ams\resources\views/pages/tfl/info.blade.php ENDPATH**/ ?>