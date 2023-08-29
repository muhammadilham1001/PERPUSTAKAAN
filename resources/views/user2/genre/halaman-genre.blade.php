<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Halaman Genre</title>
    @include('user2.template.head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('user2.template.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('user2.template.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Genre Perpustakaan</h1>
                    <hr style="margin-bottom: 10px">
                </div>


                <div class="row">
                    <div class="card-body"><button type="button"  data-bs-toggle="modal" data-bs-target="#create" class="btn btn-success  ml-1"
                                style="margin-bottom: -57px">+
                                Tambah Genre</button>

                        <div class="row justify-content-end mr-2 mb-3">
                            <form action="/halaman-genre" method="GET"
                                class="d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="search" class="form-control bg-gray border-0 small"
                                        placeholder="Cari yang anda inginkan!" name="search"
                                        value="{{ request('search') }}" aria-label="Search"
                                        aria-describedby="basic-addon2" autofocus>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Genre</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close</button>
                                </div>
                                <div class="modal-body">
                                    
                        <form action="{{ route('simpan-genre') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Genre"
                                    aria-label="judul" aria-describedby="basic-addon1" name="genre"
                                    {{ old('genre') }}>
                            </div>
                            @error('genre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                                </div>
                                </div>
                            </div>
                            </div>

                  

                        <table class="table table-hover text-center justify-content-center">
                            <thead class="justif-content-end" style="font-weight: bold">
                                <tr>
                                    <td>No</td>
                                    <td>Genre</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            @if (count($dtgenre) != 0)
                                @foreach ($dtgenre as $index => $item)
                                    <tbody class="table-striped">
                                        <tr>
                                            <td>{{ $index + $dtgenre->firstItem() }}</td>
                                            <td>{{ $item->genre }}</td>
                                            <td class="d-flex justify-content-around">
                                            <button type="submit"
                                                        class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" style="margin-right: -79px;"><i
                                                            class="fas fa-pen"></i></button>
                                                <form action="/delete-genre/{{ $item->id }}" method="POST"
                                                    class="delete-form" id="delete-form-{{ $item->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="confirmDelete(event, {{ $item->id }})"
                                                        style="margin-left: -90px">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php $i++; ?>
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Genre</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close</button>
                                </div>
                                <div class="modal-body">
                                    
                        <form action="{{ route('update-genre', $item->id) }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Genre"
                                    aria-label="judul" aria-describedby="basic-addon1" value="{{ $item->genre}}" name="genre"
                                    {{ old('genre') }}>
                            </div>
                            @error('genre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                                </div>
                                </div>
                            </div>
                            </div>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">Tidak ada data</td>
                                </tr>
                            @endif
                        </table>
                        {{ $dtgenre->appends(['search' => request('search')])->links() }}

                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script>
                            function confirmDelete(event, id) {
                                event.preventDefault(); // Menghentikan submit form

                                Swal.fire({
                                    title: 'Yakin ingin menghapus data ini?',
                                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, hapus!',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Kode untuk melakukan penghapusan data di sini
                                        document.getElementById(`delete-form-${id}`)
                                            .submit(); // Melanjutkan submit form setelah konfirmasi
                                    }
                                });
                            }
                        </script>
                    </div>



                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('user2.template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('user2.template.logout')

    @include('user2.template.script')
    @include('sweetalert::alert')


</body>

</html>
