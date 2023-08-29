<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Edit Buku</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Buku Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>


                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ url('update-buku', $edit->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Judul Buku"
                                    aria-label="judul" aria-describedby="basic-addon1" name="judul"
                                    value="{{ $edit->judul }}">
                            </div>
                            @error('judul')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Pengarang"
                                    aria-label="pengarang" aria-describedby="basic-addon1" name="pengarang"
                                    value="{{ $edit->pengarang }}">
                            </div>
                            @error('pengarang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Penerbit"
                                    aria-label="penerbit" aria-describedby="basic-addon1" name="penerbit"
                                    value="{{ $edit->penerbit }}">
                            </div>
                            @error('penerbit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label">Edit Genre Buku :</label>
                                <select class="form-control select" name="genre_id" id="genre_id">
                                    <option disabled value>---Pilih Genre---</option>
                                    <option value="{{ $edit->genre_id }}">{{ $edit->genre->genre }}</option>
                                    @foreach ($genre as $item)
                                        <option value="{{ $item->id }}">{{ $item->genre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-4">
                                <input type="date" class="form-control" placeholder="Masukan link Buku"
                                    aria-label="link" aria-describedby="basic-addon1" name="tahun_terbit"
                                    value="<?= date('Y-m-d', strtotime($edit['tahun_terbit'])) ?>">
                            </div>
                            @error('tahun_terbit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-4">
                                <label for="formFile" class="form-label">Edit gambar Buku :</label><br>
                                <img src="{{ asset('template/img/' . $edit->gambar) }}" width="10%" height="10%"
                                    alt="">
                                <input class="form-control mt-3" type="file" id="formFile" name="gambar"
                                    value="{{ $edit->gambar }}">
                            </div>
                            @error('gambar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Edit Data</button>
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
