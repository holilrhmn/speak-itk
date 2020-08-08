@extends('ppid.templates.default')
@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="container">
            <h5 class="text-center mt-1">Detail Laporan</h5>
            {{-- <form>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Subjek :</label>
                    <div class="col-sm-10">
                      <input type="text-area" readonly class="form-control-plaintext" id="staticEmail" value="{{ $laporan->subjek }}">
                    </div>
                </div>
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
            </form> --}}
            <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row">Subjek</th>
                    <td>: {{ $laporan->subjek }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Deskripsi</th>
                    <td colspan="2">: {{ $laporan->laporan }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Ketegori Laporan</th>
                    <td>: {{ $laporan->kategori->nama_kategori }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Kerahasian Laporan</th>
                    <td>: {{ $laporan->pilihan }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Status Laporan</th>
                    <td>: @if ($laporan->status->nama === 'Pending')
                        <span class="badge badge-danger">{{ $laporan->status->nama }}</span>
                          @elseif($laporan->status->nama === 'Verifikasi')
                        <span class="badge badge-info">{{ $laporan->status->nama }}</span>
                          @elseif($laporan->status->nama === 'Complete')
                        <span class="badge badge-success">{{ $laporan->status->nama }}</span>
                          @else
                        <span class="badge badge-warning">{{ $laporan->status->nama }}</span>
                          @endif</td>
                  </tr>
                  <tr>
                    <th scope="row">Telah Ditinjau</th>
                    <td>: @if ($laporan->ditinjau === 'false')
                        <span class="badge badge-danger">Belum Ditinjau</span>
                          @elseif($laporan->ditinjau === 'true')
                        <span class="badge badge-success">Sudah Selesai Ditinjau</span>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Ditinjau Oleh</th>
                    <td>: {{ $laporan->unit->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Lampiran</th>
                    <td>: <a href="download/{{ $laporan->lampiran }}" class="btn btn-primary btn-sm" id="download"><i class="fas fa-download"></i> Download</a></td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="card-footer">
            <div class="pull-right">
                <a class="btn btn-outline-primary" href="{{ route('ppid.laporan.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Penilaian</h3>
          <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        @if (empty($laporan->rating))
            <div class="card-body text-center">
                <h4>Hasil Penilaian</h4>
                <p>Belum Ada Penilaian Saat ini</p>
            </div>
            @else
            <div class="card-body text-center">
                <h4>Hasil Penilaian</h4>
                @if($laporan->rating == 'Sangat Puas')
                    <button type="button" class="btn btn-success btn-lg">{{ $laporan->rating }} 😊</button>
                @elseif($laporan->rating == 'Cukup Puas')
                    <button type="button" class="btn btn-info btn-lg">{{ $laporan->rating }} 🙂 </button>
                @else
                    <button type="button" class="btn btn-danger btn-lg">{{ $laporan->rating }} ☹️</button>
                @endif
            </div>
            @endif
        <!-- /.card-footer -->
      </div>
    @comments(['model' => $laporan])

</div>

@endsection
