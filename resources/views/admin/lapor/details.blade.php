@extends('admin.templates.default')
@section('content')

<div class="container">
    <div class="card card-outline card-primary">
        <div class="container">
            <h5 class="text-center mt-1">Detail Laporan</h5>
            <form>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label"> Laporan             :</label>
                  <div class="col-sm-10">
                    <input type="text-area" readonly class="form-control-plaintext" id="staticEmail">{!! $laporan->laporan !!}
                  </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Kategori Laporan :</label>
                    <div class="col-sm-10">
                      <input type="text-area" readonly class="form-control-plaintext" id="staticEmail" value="{{ $laporan->kategori->nama_kategori }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Kerahasian Laporan :</label>
                    <div class="col-sm-10">
                      <input type="text-area" readonly class="form-control-plaintext" id="staticEmail" value="{{ $laporan->pilihan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Status Laporan :</label>
                    <div class="col-sm-10 mt-2">
                        @if ($laporan->status->nama === 'Pending')
                        <span class="badge badge-danger">{{ $laporan->status->nama }}</span>
                          @elseif($laporan->status->nama === 'Verifikasi')
                        <span class="badge badge-info">{{ $laporan->status->nama }}</span>
                          @elseif($laporan->status->nama === 'Complete')
                        <span class="badge badge-success">{{ $laporan->status->nama }}</span>
                          @else
                        <span class="badge badge-warning">{{ $laporan->status->nama }}</span>
                          @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Tanggal Laporan :</label>
                    <div class="col-sm-10">
                      <input type="text-area" readonly class="form-control-plaintext" id="staticEmail" value="{{ $laporan->created_at}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Lampiran :</label>
                    <div class="col-sm-10">
                        <a href="download/{{ $laporan->lampiran }}" class="btn btn-primary btn-sm" id="download"><i class="fas fa-download"></i> Download</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="pull-right">
                <a class="btn btn-outline-primary" href="{{ route('admin.laporan.index') }}">Kembali</a>
            </div>
        </div>
    </div>

    @comments(['model' => $laporan])
</div>

@endsection
