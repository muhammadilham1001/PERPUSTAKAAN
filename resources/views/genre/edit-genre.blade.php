<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Edit Genre</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Genre Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('update-genre', $edit->id) }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Genre"
                                    aria-label="judul" aria-describedby="basic-addon1" name="genre"
                                    value="{{ $edit->genre }}">
                            </div>
                            @error('genre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Edit Data</button>
                            <a href="/halaman-genre" class="btn btn-danger">Kembali</a>
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
        @include('template.logout')

        @include('template.script')

</body>

</html>
