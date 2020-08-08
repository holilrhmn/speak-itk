@extends('ppid.templates.default')

@section('content')

<div class="card card-outline card-primary">
    <div class="rows">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Filter Data Lapor</h2>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('ppid.laporan.search') }}" method="POST">
            @csrf

            <div class="form-group">
                    <label >Pilih Tanggal/Bulan/Tahun</label>
                    <input type="date" name="from" max="3000-12-31"
                        min="1000-01-01" class="form-control">
            </div>
            <div class="text-center">
                <input type="submit" value="Cari" class="btn btn-primary">
            </div>
        </form>
    </div>


</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $("#date").datepicker({
            showOn: "button",
            buttonImage: "/crudv22/public/overcast/images/calendar19.gif",
            buttonImageOnly: true,
            dateFormat: "yy",
            changeMonth: true,
            changeYear: true
        });
    });

    $('.datepicker').datepicker({
    startDate: '-3d'
});
</script>

@endpush
@endsection
