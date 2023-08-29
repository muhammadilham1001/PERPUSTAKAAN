<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Halaman Petugas</title>
    @include('template.head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <h1 class="h3 mb-4 text-gray-800">Pendaftar</h1>
                    <hr style="margin-bottom: 10px">
                </div>


                <div class="row">
                    <div class="card-body">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#create" class="btn btn-success ml-1"
                                style="margin-bottom: -57px">+
                                Tambah</button>

                        <div class="row justify-content-end mr-2 mb-3">
                            <form action="/halaman-petugas" method="GET"
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
                                <td>Email</td>
                                <td>Aksi</td>
                            </thead>
                            <?php $i = 1; ?>
                            @if (count($users) != 0)
                                @foreach ($users as $index => $item)
                                @if ($item->role === 'user')
                                    <tbody class="table-striped">
                                        <td>{{ $index + $users->firstItem() }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <form action="/delete-petugas/{{ $item->id }}" method="POST"
                                                class="delete-form" id="delete-form-{{ $item->id }}">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#data-{{ $item->id }}">
                                                   <i class="fas fa-eye"></i>
                                            </button>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete(event, {{ $item->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            </form>
                                        </td>
                                    </tbody>
                                    @endif
                                    <?php $i++; ?>
                                    <div class="modal fade" id="data-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pendaftar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close</button>
                                        </div>
                                        <div class="modal-body">
                                         <form action="/resetUser" method="POST" class="user">
                                            @csrf
                                            <div class="w-50">
                                                <label for="">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</label>
                                                <input type="text" class="form-control"  value="{{ $item->name }}" id="">
                                            </div>
                                            <div class="w-50" style="margin-left: 15em; margin-top: -2.4em;">
                                                <input type="text" class="form-control" name="email" value="{{ $item->email }}" id="">
                                            </div><br>
                                             <div class="w-50">
                                                <label for="">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm</label>
                                                <input type="password" class="form-control" name="password" placeholder="Masukkan password baru" id="">
                                            </div>
                                             <div class="w-50" style="margin-left: 15em; margin-top: -2.3em;">
                                                <input type="password" class="form-control" name="konfirmasi_password"  placeholder="Konfirmasi Password" id="">
                                            </div><br>
                                    <script>
                                    function check(input) {
                                        if (input.value !== document.getElementById('password').value) {
                                            input.setCustomValidity('konfirmasi password tidak valid');
                                            document.getElementById('message').innerHTML = '';
                                        } else {
                                            input.setCustomValidity('');
                                            document.getElementById('message').innerHTML = '';
                                        }
                                    }
                                </script>
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4">Tidak ada data</td>
                                    </tr>
                                    @endif
                                </table>
                               
                        {{ $users->appends(['search' => request('search')])->links() }}


                      

                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script>
                            function confirmDelete(event, id) {
                                event.preventDefault();

                                Swal.fire({
                                    title: 'Yakin ingin menghapus user ini?',
                                    text: 'User akan dihapus?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, hapus!',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById(`delete-form-${id}`)
                                            .submit(); 
                                    }
                                });
                            }
                        </script>
                    </div>



                </div>
                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pendaftar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                    <div class="modal-body">
                        <form action="/registerUser" method="POST" class="user">
                        @csrf
                           <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleFirstName" name="name" placeholder="Masukan Username"
                                            required>
                                    </div>

                                </div>
                                <div class="form-group" style="margin-top: -10px">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        id="exampleInputEmail" placeholder="Email Address" required>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            placeholder="Password" name="password" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="konfirmasi_password" placeholder="Konfirmasi Password"
                                            name="konfirmasi_password" oninput="check(this)" required>
                                        <span id="message"></span>
                                    </div>
                                </div>

                                <script>
                                    function check(input) {
                                        if (input.value !== document.getElementById('password').value) {
                                            input.setCustomValidity('konfirmasi password tidak valid');
                                            document.getElementById('message').innerHTML = '';
                                        } else {
                                            input.setCustomValidity('');
                                            document.getElementById('message').innerHTML = '';
                                        }
                                    }
                                </script>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    @include('sweetalert::alert')


</body>

</html>
