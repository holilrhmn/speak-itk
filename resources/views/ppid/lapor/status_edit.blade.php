@extends('ppid.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Status Verifikasi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ppid.laporan.update-status', $laporan)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('status_id') has-error @enderror ">
                    <select name="status_id" class="form-control select2" >
                            <option value="pilih_kategori">Pilih Status</option>
                        @foreach ($status as $status)
                            <option value="{{ $status->id }}">{{ $status->nama }}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <span  class="help-block"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Kirim" class="btn btn-primary">
                    <div class="pull-right">
                        <a class="btn btn-outline-primary" href="{{ route('ppid.laporan.index') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
