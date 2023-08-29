<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Halaman Anggota</title>
    @include('template.head')
    {{-- Sweet alert --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- End sweet alert --}}
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Peminjam</h1>
                    <hr style="margin-bottom: 5px">
                </div>


                <div class="row">
                    <div class="card-body">


                        <div class="row justify-content-end mr-2 mb-3">
                            <form action="/history-peminjam" method="GET"
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


                        <table class="table table-hover col-12 text-center justify-content-center">
                            <thead class="" style="font-weight: bold">
                                <td>No</td>
                                <td>Nama</td>
                                <td>Status</td>
                                <td>Alamat</td>
                                <td>Buku</td>
                                <td>Aksi</td>
                            </thead>
                            <?php $i = 1; ?>
                            @if (count($buku) != 0)
                                @foreach ($buku as $index => $item)
                                    <tbody class="table-striped">
                                        <td>{{ $index + $buku->firstItem() }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td class="d-flex justify-content-around">
                                            <form action="/delete-peminjam/{{ $item->id }}" method="POST"
                                                class="delete-form" id="delete-form-{{ $item->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="confirmDelete(event, {{ $item->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tbody>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            @endif
                        </table>
                        {{ $buku->appends(['search' => request('search')])->links() }}

                    </div>

                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        function confirmDelete(event, id) {
                            event.preventDefault(); 

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
                                    document.getElementById(`delete-form-${id}`).submit(); // Submit form setelah pengguna mengonfirmasi
                                }
                            });
                        }
                    </script>

                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
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
    @include('template.logout')

    @include('template.script')
    @include('sweetalert::alert')


</body>

</html>
