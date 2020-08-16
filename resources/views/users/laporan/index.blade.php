@extends('users.default')

@section('content')

    @forelse ($lapor as $l)
    <div class="card card-outline card-primary mb-3" >
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ asset('storage')}}/{{ $l->lampiran }}" class="card-img" alt="Lampiran">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $l->subjek }}</h5>
              <p class="card-text">{!! $l->laporan !!}</p>
              <p class="card-text">
                @if ($l->status->nama === 'Pending')
                <span class="badge badge-danger">{{ $l->status->nama }}</span>
                  @elseif($l->status->nama === 'Verifikasi')
                <span class="badge badge-info">{{ $l->status->nama }}</span>
                  @elseif($l->status->nama === 'Complete')
                <span class="badge badge-success">{{ $l->status->nama }}</span>
                  @else
                <span class="badge badge-warning">{{ $l->status->nama }}</span>
                  @endif</td>
              </p>
              <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($l->created_at)->format('d M Y') }}</small></p>

            <a href="{{ route('show', $l) }}" class="btn btn-primary">Cek Detail</a>

                <button href="{{route('laporan.destroy', $l->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i> Hapus</button>


            </div>
          </div>
        </div>
        <form action="" method="post" id="deleteForm">
            @csrf
            @method("DELETE")
            <input type="submit" value="Hapus" style="display:none">
            </form>
        </div>
        @empty
        <div class="alert alert-info" role="alert">
            <strong>Tidak Ada Laporan yang pernah disampaikan!</strong> Jika Ingin Melakukan Laporan Silahkan Isi <a href="{{ route('homepage') }}" class="alert-link">Form Lapor Pada Halaman Utama.</a>, Terima Kasih.
          </div>

    @endforelse
    <br/>
    {{ $lapor->links() }}
    @push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    $('button#delete').on('click', function(e){
      e.preventDefault();

      var href = $(this).attr('href');

      Swal.fire({
          title: 'Apakah Kamu yakin akan menghapus data ini?',
          text: "Data yang sudah dihapus tidak dapat dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
          if (result.value) {
              document.getElementById('deleteForm').action = href;
              document.getElementById('deleteForm').submit();
                  Swal.fire(
                  'Berhasi Dihapus!',
                  'Data Kamu Berhasil Dihapus.',
                  'success'
                  )
              }
          })


    })
    </script>
    @endpush
@endsection
