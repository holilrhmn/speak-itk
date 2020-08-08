@extends('ppid.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kategori</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ppid.category.update', $category)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('nama_kategori') class="text-danger" @enderror >Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kategori"  value="{{ $category->nama_kategori ?? old('nama_kategori') }}">
                    @error('nama_kategori')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
