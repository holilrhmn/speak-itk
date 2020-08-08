<div class="btn-group" role="group" aria-label="...">
    <a href="{{route('admin.category.edit', $model)}}" class="btn btn-outline-warning btn-sm"> <i class="fas fa-edit"></i>Edit </a>
    <button href="{{route('admin.category.destroy', $model)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i> Delete </button>
</div>
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
