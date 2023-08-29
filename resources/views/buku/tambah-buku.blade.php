<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Tambah Buku</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Buku Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>


                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('simpan-buku') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Judul Buku"
                                    aria-label="judul" aria-describedby="basic-addon1" name="judul"
                                    value="{{ old('judul') }}">
                            </div>
                            @error('judul')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Pengarang"
                                    aria-label="pengarang" aria-describedby="basic-addon1" name="pengarang"
                                    value="{{ old('pengarang') }}">
                            </div>
                            @error('pengarang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Penerbit"
                                    aria-label="penerbit" aria-describedby="basic-addon1" name="penerbit"
                                    value="{{ old('penerbit') }}">
                            </div>
                            @error('penerbit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label">Masukan Genre Buku :</label>
                                <select class="form-control select" name="genre_id" id="genre_id">
                                    <option disabled value>---Pilih Genre---</option>
                                    @foreach ($genre as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('genre_id') == $item->id ? 'selected' : null }}>
                                            {{ $item->genre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-4">
                                <input type="date" class="form-control" placeholder="Masukan link Buku"
                                    aria-label="link" aria-describedby="basic-addon1" name="tahun_terbit"
                                    value="{{ old('tahun_terbit') }}">
                            </div>
                            @error('tahun_terbit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-4">
                                <label for="formFile" class="form-label">Masukan gambar Buku :</label>
                                <input class="form-control" type="file" id="formFile" name="gambar"
                                    value="{{ old('gambar') }}">
                            </div>
                            @error('gambar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/halaman-buku" class="btn btn-danger">Kembali</a>
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
