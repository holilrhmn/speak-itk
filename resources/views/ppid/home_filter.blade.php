@extends('ppid.templates.default')

@section('content')
   
    <h3>Data Lapor ITK</h3>
    <div class="container-fluid">
        @if ($message = Session::get('Success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $jumlah_laporan }}</h3>

                            <p>Data Laporan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="{{ route('ppid.laporan.index') }}" class="small-box-footer">Lihat Data Laporan <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlah_kategori }}<sup style="font-size: 20px"></sup></h3>

                            <p>Data Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-navicon"></i>
                        </div>
                        <a href="{{ route('ppid.category.index') }}" class="small-box-footer">Lihat Data Kategori <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $laporan_selesai }}<sup style="font-size: 20px"></sup></h3>

                            <p>Jumlah Laporan Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-round"></i>
                        </div>
                        <a href="#" class="small-box-footer">Jumlah Laporan Terselesaikan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $not_complete }}<sup style="font-size: 20px"></sup></h3>

                            <p>Jumlah Laporan Belum Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-round"></i>
                        </div>
                        <a href="#" class="small-box-footer">Laporan Belum Terselesaikan </a>
                    </div>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="card card-info">
                <div class="card-header">
                    <div class="inner">
                        <h3 class="card-title">Lihat Dashboard berdasarkan Tahun</h3>
                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('ppid.dashboard.filter') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Pilih Tahun</label>
                            <input type="text" 
                            id="datepicker" name="filter"  class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Lihat" class="btn btn-primary">
                        </div>
                    </form>
                  </div>                
            </div>
        </div>
    </div>



@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script>
        $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
    });
    </script>
@endpush
@endsection
