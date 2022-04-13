@extends('layouts.tabler')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="container-xl">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">Daftar Kegiatan</h3> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-vcenter card-table">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Program</th>
                    <th>Kegiatan</th>
                    <th>Pagu</th>
                    <th>Tahun Anggaran</th>
                    <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                  @endphp
                    @foreach($data as $item)
                    @php
                    $number = $item->pagu;
                    $pagu = "Rp" . number_format($number,2,',','.');
                    @endphp
                    <tr>
                      <td>{{$i++}}</td>
                    <td>{{$item->kegiatan->sub_kegiatan}}</td>
                    <td>{{$item->nama_pekerjaan}}</td>
                    <td>{{$pagu}}</td>
                    <td>{{$item->tahun_anggaran}}</td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-team{{$item->id}}">
                                  Upload Dokumen
                                </a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-foto{{$item->id}}">
                                  Upload Foto
                                </a>
                                <a class="dropdown-item" href="#">
                                  Output
                                </a>
                              </div>
                            </div>
                          </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
  @foreach ($data as $d)
  <!-- Upload Dokumen -->
  <div class="modal modal-blur fade" id="modal-team{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <form action="{{route('dokumen.post')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{$d->nama_pekerjaan}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3 align-items-end">
              <div class="col-auto">
                <!-- Preview goes here -->
              </div>
              <div class="col">
                <label class="form-label">File</label>
                <input type="file" name="files[]" class="form-control" accept="*" multiple>
                <input value="{{$d->id}}" type="text" name="pekerjaan_id" id="pekerjaan_id" hidden>
              </div>
            </div>
            <div>
              <label class="form-label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Tambah keterangan, misal; HPS, Gambar, dsb "></textarea>
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
  <!-- Upload Foto -->
  <div class="modal modal-blur fade" id="modal-foto{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="/foto/pekerjaan/post" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{$d->nama_pekerjaan}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row mb-3 align-items-end">
                <div class="col-auto">
                  <a href="#" class="avatar avatar-upload rounded">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <span class="avatar-upload-text">
                    <img id="prev" src="#" alt="Foto" />
                    </span>
                  </a>
                </div>
                <div class="col">
                  <label class="form-label">Foto</label>
                  <input name="images[1]" type="file" id="img" class="form-control" />
                  <input value="{{$d->id}}" type="text" name="pekerjaan_id" id="pekerjaan_id" hidden>
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
  @endforeach
@endsection
@section('js')
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
<script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>



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
        ordering: true,
        info:     true,
        buttons: [
            {
                extend: 'copyHtml5',
                className: 'btn btn-dark',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'excelHtml5',
                className: 'btn btn-dark',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4]
                }
            },
            {
              extend: 'print',
              className: 'btn btn-dark',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-dark',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
        ]
    } );
    $('#example1_filter input').addClass('form-control form-control-sm'); // <-- add this line
    $('#example1_filter label').addClass('text-muted'); // <-- add this line



} );
</script>
@endsection