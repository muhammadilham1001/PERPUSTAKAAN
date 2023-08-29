<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Dashboard</title>
    @include('template.head')

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
                    <h1 class="h3 mb-4 text-gray-800">Edit Karya Pengarang Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>


                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('update-karya-pengarang', $pengarang->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <select name="nama" id="nama">
                                    <option disabled value>Pilih Nama Pengarang</option>
                                    @foreach ($peng as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Karya Pengarang"
                                    aria-label="alamat" aria-describedby="basic-addon1" name="karyaPengarang"
                                    value="{{ $item->karya_pengarang }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/halaman-karya-pengarang" class="btn btn-danger">Kembali</a>
                        </form>

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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        @include('template.script')

</body>

</html>
