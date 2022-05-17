<?php $__env->startSection('title', 'Data Kontrak'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .select2-offscreen,
        .select2-offscreen:focus {
            // Keep original element in the same spot
            // So that HTML5 valiation message appear in the correct position
            left: auto !important;
            top: auto !important;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Data Kontrak</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Kontrak</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tahun Anggaran 2022</h5>
                        <div class="card-header-right">
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#modal-kontrak"
                                data-bs-original-title="" title=""> <span class="fa fa-edit"></span>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table id="example1" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program</th>
                                        <th>Kegiatan</th>
                                        <th>Nomor Kontrak</th>
                                        <th>Tanggal Kontrak</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                    ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $kontrak = 'Rp' . number_format($item->harga_kontrak, 2, ',', '.');
                                        ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item->pekerjaan->kegiatan->sub_kegiatan); ?></td>
                                            <td><a
                                                    href="/pekerjaan/<?php echo e($item->pekerjaan->id); ?>"><?php echo e($item->pekerjaan->nama_pekerjaan); ?></a>
                                            </td>
                                            <td><?php echo e($item->no_spk); ?></td>
                                            <td><?php echo e(date('j F, Y', strtotime($item->tgl_spk))); ?></td>
                                            <td><?php echo e($kontrak); ?></td>
                                            <td>
                                                <div class="card-body btn-showcase">
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modal-hapus<?php echo e($item->id); ?>"><i
                                                            class="fa fa-trash"></i></button>
                                                    <button class="btn btn-warning btn-edit" data-bs-toggle="modal"
                                                        data-bs-target="#modal-ubah<?php echo e($item->id); ?>" id="edit-item"
                                                        data-id="<?php echo e($item->id); ?>"><i
                                                            class="fa fa-edit"></i></button>
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
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-kontrak" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kontrak</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="<?php echo e(route('kontrak.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Program</label>
                                <select id="program_id" name="program_id" class="form-control select2 select2-offscreen" required
                                    style="width: 100%;">
                                    <option selected disabled value="">Pilih Program/Kegiatan/Sub Kegiatan</option>
                                    <optgroup label="Sanitasi">
                                        <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                                        <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat
                                            Skala Permukiman</option>
                                    </optgroup>
                                    <optgroup label="Air Minum">
                                        <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                        <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                        <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan_id">Kegiatan</label>
                                <select id="pekerjaan_id" value="" name="pekerjaan_id" class="form-control select2 select2-offscreen"
                                    style="width: 100%;" required>
                                    <option value="">Pilih Kegiatan</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <label class="form-label">Nomor SPK</label>
                                        <input name="no_spk" type="text" class="form-control" required="">
                                        <div class="invalid-feedback"><a class="text-danger">Nomor SPK Invalid!</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kontrak</label>
                                        <input name="tgl_spk" type="date" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Masa Pelaksanaan</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mulai</label>
                                        <input name="tgl_mulai" type="date" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Selesai</label>
                                        <input name="tgl_selesai" type="date" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pelaksana</label>
                                        <input name="nama_pelaksana" type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pengawas</label>
                                        <input name="nama_pengawas" type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3" tabindex="0" id="currency">
                                        <label class="form-label">Nomor Kontrak</label>
                                        <div class="input-group input-group-flat">
                                            <input type="text" class="form-control" name="pagu" id="pagu"
                                                data-type="currency" placeholder="Nilai Kontrak"
                                                required>
                                            <input value="" type="numeric" class="form-control" id="harga_kontrak"
                                                name="harga_kontrak" hidden>
                                        </div>
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
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal modal-blur fade" id="modal-hapus<?php echo e($d->id); ?>" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path
                                d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
                        <h3>Apakah anda yakin?</h3>
                        <div class="text-muted">Hapus Data Kontrak Kegiatan <?php echo e($d->pekerjaan->nama_pekerjaan); ?></div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Batal
                                    </a></div>
                                <form action="<?php echo e(route('kontrak.destroy', $d->id)); ?>" method="post">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <div class="col">
                                        <button class="btn btn-danger w-100" type="submit">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" name="modal-ubah" id="modal-ubah<?php echo e($d->id); ?>" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Kontrak</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('kontrak.update', $d->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Program</label>
                                    <select id="program" name="program_id" class="form-control select2 select-ubah select2-offscreen"
                                        required style="width: 100%;">
                                        <option selected disabled value="">Pilih Program</option>
                                        <optgroup label="Sanitasi">
                                            <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                                            <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat
                                                Skala Permukiman</option>
                                        </optgroup>
                                        <optgroup label="Air Minum">
                                            <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                                            </option>
                                            <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                                            </option>
                                            <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_id">Kegiatan</label>
                                    <select id="kegiatan" name="pekerjaan_id" class="form-control select2 select-ubah select2-offscreen"
                                        style="width: 100%;" required>
                                        <option value="">Pilih Kegiatan</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div>
                                            <label class="form-label">Nomor SPK</label>
                                            <input id="no_spk" name="no_spk" type="text" class="form-control" required="">
                                            <div class="invalid-feedback"><a class="text-danger">Nomor SPK Invalid!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Kontrak</label>
                                            <input id="tgl_spk" name="tgl_spk" type="date" class="form-control"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <label class="form-label">Masa Pelaksanaan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mulai</label>
                                            <input id="tgl_mulai" name="tgl_mulai" type="date" class="form-control"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Selesai</label>
                                            <input id="tgl_selesai" name="tgl_selesai" type="date" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Pelaksana</label>
                                            <input id="nama_pelaksana" name="nama_pelaksana" type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Pengawas</label>
                                            <input id="nama_pengawas" name="nama_pengawas" type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nilai Kontrak</label>
                                            <input type="text" class="form-control" name="pagu" id="kontrak"
                                                data-type="currency" placeholder="Nilai Kontrak"
                                                required>
                                            <input id="n_kontrak" name="harga_kontrak" type="numeric" class="form-control" required="">
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <script>
        <?php if($errors->any()): ?>
        Swal.fire({
        title: 'Error!',
        text:  '<?php echo e(implode('', $errors->all(':message'))); ?>',
        icon: 'error',
        confirmButtonText: 'Ok'
        })
        <?php endif; ?>
    </script>
    <script>
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                type: "GET",
                url: "<?php echo e(url('edit/kontrak')); ?>",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#kontrak').val(res.harga_kontrak);
                    $('#no_spk').val(res.no_spk);
                    $('#tgl_spk').val(res.tgl_spk);
                    $('#tgl_mulai').val(res.tgl_mulai);
                    $('#tgl_selesai').val(res.tgl_selesai);
                    $('#nama_pelaksana').val(res.nama_pelaksana);
                    $('#nama_pengawas').val(res.nama_pengawas);
                    var $newOption = $("<option selected='selected'></option>").val(res.kegiatan.id).text(res.kegiatan.program)
                    $("#program").append($newOption).trigger('change');
                    var $newOption = $("<option selected='selected'></option>").val(res.pekerjaan.id).text(res.pekerjaan.nama_pekerjaan)
                    $("#kegiatan").append($newOption).trigger('change');
                }
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                ordering: true,
                info: true,
                buttons: [{
                        extend: 'copyHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                ]
            });
            $('#example1_filter input').addClass('form-control form-control-sm'); // <-- add this line
            $('#example1_filter label').addClass('text-muted'); // <-- add this line
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery($('#pagu')).on('change', function() {
                var pagu = jQuery(this).val();
                $($('#harga_kontrak')).val(pagu.replace(/\D/g, ""));

            })

        })
        jQuery(document).ready(function() {
            jQuery($('#kontrak')).on('change', function() {
                var pagu = jQuery(this).val();
                $($('#n_kontrak')).val(pagu.replace(/\D/g, ""));

            })

        })
        $(document).ready(function() {
            $(".select2").select2({
                dropdownParent: $("#modal-content"),

            });
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery($('#program_id')).on('change', function() {
                var kegID = jQuery(this).val();
                if (kegID) {
                    jQuery.ajax({
                        url: '/pekerjaan/kegiatan/' + kegID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery($('#pekerjaan_id')).empty();
                            jQuery.each(data, function(key, value) {
                                if (value.detail != null) {
                                    jQuery($('#pekerjaan_id')).empty();
                                } else {
                                    $($('#pekerjaan_id')).append('<option value="' +
                                        value.id + '">' + value.nama_pekerjaan +
                                        '</option>');
                                    // $($('#pagu')).val(value.pagu);
                                }
                            });
                        }
                    });
                } else {
                    $($('#pekerjaan_id')).empty();
                }
            });
        });
    </script>
    <script>
        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(",") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "Rp" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "Rp" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ",00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/pages/kontrak/index.blade.php ENDPATH**/ ?>