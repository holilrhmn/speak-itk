@extends('Unit-Kerja.templates.default')

@section('content')
    <h3>Data Lapor ITK</h3>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $jumlah_laporan }}</h3>

                <p>Data Laporan</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="{{ route('unit.laporan.index') }}" class="small-box-footer">Lihat Data Laporan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <!-- ./col -->

@endsection
