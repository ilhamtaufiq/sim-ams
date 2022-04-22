<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xl">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tahun Anggaran 2022</h3>
                    <?php if($errors->any()): ?>
                        <?php echo e(implode('', $errors->all(':message'))); ?>

                    <?php endif; ?>
                    <div class="card-actions">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#data-kontrak">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Program</th>
                                    <th>Kegiatan</th>
                                    <th>Kontrak</th>
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
                                        $kontrak = 'Rp' . number_format($item->harga_kontrak, 2, ',', '.');
                                    ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item->pekerjaan->kegiatan->sub_kegiatan); ?></td>
                                        <td><a
                                                href="/pekerjaan/<?php echo e($item->pekerjaan->id); ?>"><?php echo e($item->pekerjaan->nama_pekerjaan); ?></a>
                                        </td>
                                        <td><?php echo e($kontrak); ?></td>
                                        <td><?php echo e($item->pekerjaan->tahun_anggaran); ?></td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-ubah<?php echo e($item->id); ?>">
                                                            Ubah
                                                        </a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-hapus<?php echo e($item->id); ?>">
                                                            Hapus
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
    </div>
    <div class="modal modal-blur fade" id="data-kontrak" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kontrak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('kontrak.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Program</label>
                            <select name="program_id" id="program_id" class="form-control select2" style="width: 100%;">
                                <option value="">Pilih Program/Kegiatan/Sub Kegiatan</option>
                                <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                                <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala
                                    Permukiman
                                </option>
                                <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan_id">Kegiatan</label>
                            <select value="" name="pekerjaan_id" id="pekerjaan_id" class="form-control select2"
                                style="width: 100%;">
                                <option value="">Pilih Pekerjaan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div>
                                    <label class="form-label">Nomor SPK</label>
                                    <input name="no_spk" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Kontrak</label>
                                    <input name="tgl_spk" type="date" class="form-control">
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
                                    <input name="tgl_mulai" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Selesai</label>
                                    <input name="tgl_selesai" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Pelaksana</label>
                                    <input name="nama_pelaksana" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Pengawas</label>
                                    <input name="nama_pengawas" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3" tabindex="0" id="currency">
                                    <label class="form-label">Nomor Kontrak</label>
                                    <div class="input-group input-group-flat">
                                        <input type="text" class="form-control" name="pagu" id="pagu" data-type="currency"
                                            id="currency-field" placeholder="Nilai Kontrak">
                                        <input value="" type="numeric" class="form-control" id="harga_kontrak"
                                            name="harga_kontrak" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="modal modal-blur fade" id="modal-hapus<?php echo e($d->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
        <div class="modal modal-blur fade" id="modal-ubah<?php echo e($d->id); ?>" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Kontrak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('kontrak.update', $d->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Program</label>
                                <select name="program_id" id="program_id" class="form-control select2" style="width: 100%;">
                                    <option value="<?php echo e($d->program_id); ?>"><?php echo e($d->pekerjaan->kegiatan->sub_kegiatan); ?>

                                    </option>
                                    <option value="1">Pembangunan/Penyediaan Sub Sistem Pengolahan Setempat</option>
                                    <option value="2">Pembangunan/Penyediaan Sistem Pengelolaan Air Limbah Terpusat Skala
                                        Permukiman
                                    </option>
                                    <option value="3">Pembangunan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                    <option value="4">Perbaikan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                    <option value="5">Perluasan SPAM Jaringan Perpipaan di Kawasan Perdesaan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan_id">Kegiatan</label>
                                <select value="" name="pekerjaan_id" id="pekerjaan_id" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="<?php echo e($d->pekerjaan_id); ?>"><?php echo e($d->pekerjaan->nama_pekerjaan); ?></option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <label class="form-label">Nomor SPK</label>
                                        <input value="<?php echo e($d->no_spk); ?>" name="no_spk" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kontrak</label>
                                        <input value="<?php echo e($d->tgl_spk); ?>" name="tgl_spk" type="date"
                                            class="form-control">
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
                                        <input value="<?php echo e($d->tgl_mulai); ?>" name="tgl_mulai" type="date"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Selesai</label>
                                        <input value="<?php echo e($d->tgl_selesai); ?>" name="tgl_selesai" type="date"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pelaksana</label>
                                        <input value="<?php echo e($d->nama_pelaksana); ?>" name="nama_pelaksana" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pengawas</label>
                                        <input value="<?php echo e($d->nama_pengawas); ?>" name="nama_pengawas" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3" tabindex="0" id="currency">
                                        <label class="form-label">Nomor Kontrak</label>
                                        <div class="input-group input-group-flat">
                                            <input value="<?php echo e($d->harga_kontrak); ?>" type="text" class="form-control"
                                                name="pagu" id="pagu" data-type="currency" id="currency-field"
                                                placeholder="Nilai Kontrak">
                                            <input value="<?php echo e($d->harga_kontrak); ?>" type="numeric" class="form-control"
                                                id="harga_kontrak" name="harga_kontrak" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!--Data Table-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>



    <!--Export table buttons-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                dropdownParent: $("#data-kontrak")
            });
        });
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

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/pages/kontrak/index.blade.php ENDPATH**/ ?>