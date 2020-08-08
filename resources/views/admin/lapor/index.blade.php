@extends('admin.templates.default')
@section('content')


<div class="card card-outline card-primary">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="text-center">

                <h2>Data Lapor</h2>

            </div>

            {{-- <div class="pull-right">

                <a class="btn btn-primary" href="#"><i class="fas fa-plus-circle"></i>  Tambah Kategori</a>

            </div> --}}

        </div>

    </div>


    @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
        @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
      @endif

      @if ($message = Session::get('warning'))
      <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('info'))
          <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif
    <div class="container">
        <table id="table" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengirim</th>
                    <th>Deskripsi Laporan</th>
                    <th>Kategori</th>
                    <th>Lampiran</th>
                    <th>Pilihan Laporan</th>
                    <th>Status</th>
                    <th>Ditinjau</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($laporan as $l)

                   <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                        @if ($l->pilihan === 'Anonim')
                            Anonim
                        @else
                            {{ $l->user->name }}
                        @endif
                        </td>
                        <td>{!! $l->laporan !!}</td>
                        <td>
                           {{ $l->kategori->nama_kategori }}
                        </td>
                        <td>
                            <a href="laporan/download/{{ $l->lampiran }}" class="btn btn-outline-primary btn-sm" id="download"><i class="fas fa-download"></i> Download</a>
                        </td>
                        <td>{{ $l->pilihan }}</td>
                        <td>
                            {{-- @foreach($l->status->nama as $n) --}}
                            @if ($l->status->nama === 'Pending')
                                <span class="badge badge-danger">{{ $l->status->nama }}</span>
                            @elseif($l->status->nama === 'Verifikasi')
                                <span class="badge badge-info">{{ $l->status->nama }}</span>
                            @elseif($l->status->nama === 'Complete')
                                <span class="badge badge-success">{{ $l->status->nama }}</span>
                            @else
                                <span class="badge badge-warning">{{ $l->status->nama }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Tinjau
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{ route('admin.laporan.pending',$l->id) }}">Pending</a>
                                    <a class="dropdown-item" href="{{ route('admin.laporan.proses',$l->id) }}">Proses</a>
                                    <a class="dropdown-item" href="{{ route('admin.laporan.verifikasi',$l->id) }}">Verifikasi</a>
                                    <a class="dropdown-item" href="{{ route('admin.laporan.complete',$l->id) }}">Complete</a>
                                </div>
                              </div>
                        </td>
                        <td>
                            <div class="btn-group-vertical">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.laporan.detail', $l->id) }}"><i class="fas fa-eye"></i>  View</a>
                            <button href="{{route('admin.laporan.destroy', $l->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i> Hapus</button>
                              </div>
                        </td>
                   </tr>
                @endforeach
             </tbody>
        </table>
    </div>

    <br/>
    {{--
    {{ $laporan->links() }} --}}
    </div>
    </div>
</div>

<form action="" method="post" id="deleteForm">
@csrf
@method("DELETE")
<input type="submit" value="Hapus" style="display:none">
</form>
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$('button#delete').on('click', function(e){
  e.preventDefault();

  var href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah Kamu yakin akan menghapus data ini?',
      text: "Data yang sudah dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
      if (result.value) {
          document.getElementById('deleteForm').action = href;
          document.getElementById('deleteForm').submit();
              Swal.fire(
              'Berhasi Dihapus!',
              'Data Kamu Berhasil Dihapus.',
              'success'
              )
          }
      })


})
</script>
<script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endpush
@endsection
