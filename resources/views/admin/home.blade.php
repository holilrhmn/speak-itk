@extends('admin.templates.default')

@section('content')
    <h3>Data Lapor ITK</h3>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $jumlah_user }}<sup style="font-size: 20px"></sup></h3>

                <p>Data User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="{{ route('admin.users.index') }}" class="small-box-footer">Lihat Data User <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->

@endsection
