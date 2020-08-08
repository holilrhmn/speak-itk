@extends('ppid.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kirim Laporan Ke Unit</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ppid.laporan.update', $laporan)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group @error('unit_id') has-error @enderror ">
                    <select name="unit_id" class="form-control select2" >
                            <option value="pilih_kategori">Pilih Unit</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
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
