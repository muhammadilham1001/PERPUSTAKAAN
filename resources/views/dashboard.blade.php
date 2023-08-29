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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard Perpustakaan</h1>
                    <hr style="margin-bottom: 80px">
                </div>


                <div class="row mt-5">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4" style="margin-left: 150px">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="{{ url('halaman-buku') }}" style="text-decoration: none">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-4">{{ $jumlah_buku }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="{{ 'halaman-anggota' }}" style="text-decoration: none">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-4">
                                                {{ $jumlah_anggota }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="{{ 'halaman-peminjam' }}" style="text-decoration: none">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Data peminjam</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-4">
                                                {{  $jumlah_petugas}}</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4" style="margin-left: 150px">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="{{ 'halaman-pengarang' }}" style="text-decoration: none">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Data Pengarang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-4">
                                                {{ $jumlah_pengarang }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="{{ 'halaman-penerbit' }}" style="text-decoration: none">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Data Penerbit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-4">
                                                {{ $jumlah_penerbit }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-landmark fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="{{ 'halaman-genre' }}" style="text-decoration: none">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Genre</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-4">
                                                {{ $jumlah_genre }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
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
    @include('sweetalert::alert')
</body>

</html>
