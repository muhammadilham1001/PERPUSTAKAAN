<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Tambah Penerbit</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Penerbit Perpustakaan</h1>
                    <hr style="margin-bottom: 50px">
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('simpan-penerbit') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label">Pilih Nama Penerbit:</label>
                                <select class="form-control select" name="penerbit_id" id="penerbit_id">
                                    <option disabled value>---Pilih Penerbit---</option>
                                    @foreach ($buku->unique('penerbit') as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('penerbit_id') == $item->id ? 'selected' : null }}>
                                            {{ $item->penerbit }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('penerbit_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Terbitan Populer"
                                    aria-label="penerbit" aria-describedby="basic-addon1" name="terbitan_populer"
                                    value="{{ old('terbitan_populer') }}">
                            </div>
                            @error('terbitan_populer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="">Masukan Alamat Penerbit :</label>
                            <div class="input-group mb-4">
                                <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample3" placeholder="Silahkan masukan alamatnya..." rows="3"
                                        name="alamat" style="width: 940px">{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                <input type="number" class="form-control" placeholder="Masukan Telepon Penerbit"
                                    aria-label="alamat" aria-describedby="basic-addon1" name="no_telepon"
                                    value="{{ old('no_telepon') }}">
                            </div>
                            @error('no_telepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/halaman-penerbit" class="btn btn-danger">Kembali</a>
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
