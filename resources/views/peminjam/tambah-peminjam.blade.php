<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Tambah Anggota</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data Peminjam</h1>
                    <hr style="margin-bottom: 50px">
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('simpan-peminjam') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Masukan Nama Peminjam" aria-label="judul"
                                    aria-describedby="basic-addon1" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <label for="">Masukan Jenis Kelamin :</label>
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                    type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-laki"
                                    value="{{ old('jenis_kelamin') }}"
                                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                    type="radio" name="jenis_kelamin" id="flexRadioDefault12" value="Perempuan"
                                    value="{{ old('jenis_kelamin') }}"
                                    {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexRadioDefault12">
                                    Perempuan
                                </label>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="number" class="form-control @error('wa') is-invalid @enderror"
                                    placeholder="Masukan Nomor Peminjam" aria-label="alamat"
                                    aria-describedby="basic-addon1" name="wa" value="{{ old('wa') }}">
                                @error('wa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="">Masukan Alamat Peminjam :</label>
                            <div class="input-group mb-4">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" aria-label="With textarea" name="alamat"
                                    placeholder="Silahkan masukan alamatnya...">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label">Masukan Judul Buku :</label>
                                <select class="form-control select" name="buku_id" id="buku_id">
                                    <option disabled value>---Pilih Buku---</option>
                                    @foreach ($buku as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('buku_id') == $item->id ? 'selected' : null }}>
                                            {{ $item->judul }}</option>
                                    @endforeach
                                </select>
                            </div>

                        <label for="formFile" class="form-label">Masukan Tanggal Peminjaman :</label><br>
                          <div class="input-group mb-4">
                                <input type="date" class="form-control"
                                    aria-label="link" aria-describedby="basic-addon1" name="tanggal_pinjam"
                                    value="{{ old('tanggal_pinjam') }}">
                            </div>
                            @error('tanggal_pinjam')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                         <label for="formFile" class="form-label">Masukan Tanggal Pengembalian :</label><br>
                          <div class="input-group mb-4">
                                <input type="date" class="form-control"
                                    aria-label="link" aria-describedby="basic-addon1" name="tanggal_pengembalian"
                                    value="{{ old('tanggal_pengembalian') }}">
                            </div>
                            @error('tanggal_pengembalian')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/halaman-peminjam" class="btn btn-danger">Kembali</a>
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
