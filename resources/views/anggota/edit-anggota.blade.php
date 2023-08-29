<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Edit Anggota</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Anggota Perpustakaan</h1>
                    <hr style="margin-bottom: 50px">
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('update-anggota', $edit->id) }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Pengarang"
                                    aria-label="judul" aria-describedby="basic-addon1" name="nama"
                                    value="{{ $edit->nama }}">
                            </div>
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="">Edit Jenis Kelamin :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                    id="flexRadioDefault1" value="Laki-laki" value="<?= $edit['jenis_kelamin'] ?>"
                                    <?= $edit['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                    id="flexRadioDefault12" value="Perempuan" value="<?= $edit['jenis_kelamin'] ?>"
                                    <?= $edit['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexRadioDefault12">
                                    Perempuan
                                </label>
                            </div>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="number" class="form-control" placeholder="Masukan Usia Anggota"
                                    aria-label="alamat" aria-describedby="basic-addon1" name="usia"
                                    value="{{ $edit->usia }}">
                            </div>
                            @error('usia')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <label for="">Edit Alamat Anggota :</label>
                            <div class="input-group mb-4">
                                <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample3" rows="3" name="alamat" style="width: 940px">{{ $edit->alamat }}</textarea>
                                </div>
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Edit Data</button>
                            <a href="/halaman-anggota" class="btn btn-danger">Kembali</a>
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
