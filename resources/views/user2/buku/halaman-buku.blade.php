<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Halaman Buku</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Data Buku Perpustakaan</h1>
                    <hr style="margin-bottom: 5px">
                </div>


                <div class="row">
                    <div class="card-body">
                        <a href="{{ route('tambah-buku') }}"><button type="button" class="btn btn-success  ml-1"
                                style="margin-bottom: -57px">+
                                TambahBuku</button></a>

                        <div class="row justify-content-end mr-2 mb-3">
                            <form action="/halaman-buku" method="GET"
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
                                <td>Judul</td>
                                <td>Pengarang</td>
                                <td>Penerbit</td>
                                <td>Genre</td>
                                <td>Tahun Terbit</td>
                                <td>Gambar</td>
                                <td>Aksi</td>
                            </thead>
                            <?php $i = 1; ?>
                            {{-- @if (count($buku) != 0)
                                @foreach ($buku as $index => $item)
                                    <tbody class="table-striped">
                                        <td>{{ $index + $buku->firstItem() }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->pengarang }}</td>
                                        <td>{{ $item->penerbit }}</td>
                                        <td>{{ $item->genre->genre }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tahun_terbit)) }}</td>
                                        <td><img src="{{ asset('template/img/' . $item->gambar) }}" width="25%"
                                                height="25%" alt="">
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ url('edit-buku', $item->id) }}"><button type="submit"
                                                    class="btn btn-warning"style="margin-right: 5px"><i
                                                        class="fas fa-pen"></i></button></a>
                                            <form action="/delete-buku/{{ $item->id }}" method="POST"
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
                                    <td colspan="8">Tidak ada data</td>
                                </tr>
                            @endif
                        </table>
                        {{ $buku->appends(['search' => request('search')])->links() }} --}}

                        {{-- menambahkan konfirmasi delete pakai sweet alert --}}
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
