@extends('ppid.templates.default')

@section('content')

<div class="card card-outline card-primary">
    <div class="rows">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Data Lapor</h2>
            </div>
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="#"><i class="fas fa-plus-circle"></i>  Tambah Kategori</a> --}}
            </div>
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
        <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengirim</th>
                    <th>Deskripsi Laporan</th>
                    <th>Kategori</th>
                    {{-- <th>Lampiran</th> --}}
                    <th>Kerahasian</th>
                    <th>Status</th>
                    <th>Ditinjau</th>
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
                        @endif</td>
                        <td>{{ $l->laporan }}</td>
                        <td>
                           {{ $l->kategori->nama_kategori }}
                        </td>
                        {{-- <td>
                            <a href="laporan/download/{{ $l->lampiran }}" class="btn btn-primary btn-sm" id="download"><i class="fas fa-download"></i> Download</a>
                        </td> --}}
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
                            @if ($l->ditinjau == '0')
                                <span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                            @else
                                <span class="badge badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                            @endif
                        </td>
                   </tr>
                @endforeach
             </tbody>
        </table>
        <div class="card-footer">
            <div class="pull-right">
                <a class="btn btn-outline-primary" href="{{ route('ppid.laporan.informasi') }}">Kembali</a>
            </div>
        </div>
        </div>
    </div>
    <br/>
    {{--
    {{ $laporan->links() }} --}}
    </div>
    </div>
    <form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display:none">
    </form>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endpush
@endsection
