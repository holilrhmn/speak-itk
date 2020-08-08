@extends('users.default')

@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="container">
            <h5 class="text-center mt-1">Detail Laporan</h5>
             <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row">Subjek</th>
                    <td>: {{ $laporan->subjek }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Deskripsi</th>
                    <td >: {{ $laporan->laporan }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Ketegori Laporan</th>
                    <td>: {{ $laporan->kategori->nama_kategori }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Kerahasian Laporan</th>
                    <td>
                        @if($laporan->pilihan == 'nama')
                        <p>: Tampilkan Nama</p>
                        @else
                        <p>Anonim</p>
                        @endif
                    </td>
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
                    <td>: @if ($laporan->ditinjau == '0')
                        <span class="badge badge-danger">Belum Ditinjau</span>
                          @else
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
                    <td>: <a href="download/{{ $laporan->lampiran }}" class="btn btn-primary btn-sm" id="download"><i class="fa fa-download"></i> Unduh</a></td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="card-footer">
            <div class="pull-right">
                <a class="btn btn-outline-primary" href="{{ route('lapor') }}">Kembali</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
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
            <form action="{{ route('lapor.review', $laporan->id) }}" method="POST">
                @csrf
                <div class="card-body text-center">
                Apakah Anda merasa puas dengan Hasil terkait aduan yang telah disampaikan?
                </div>
                <!-- /.card-body -->
                <div class="container text-center">
                    <label class="btn btn-outline-success ">
                        <input type="radio" name="rating"  value="Sangat Puas"> Sangat Puas  😊
                    </label>
                    <label class="btn btn-outline-info">
                        <input type="radio" name="rating"  value="Cukup Puas"> Cukup Puas 🙂
                    </label>
                    <label class="btn btn-outline-danger">
                        <input type="radio" name="rating" value="Tidak Puas"> Tidak Puas ☹️
                    </label>
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary mr-2 mb-2" type="submit"><i class="fa fa-check-square-o" aria-hidden="true"></i> Submit</button>
                </div>


            </form>
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

