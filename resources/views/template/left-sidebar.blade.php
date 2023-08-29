<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.2/dist/sweetalert2.min.css">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpus<sup>net</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Halaman</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Halaman:</h6>
                <a class="collapse-item mb-1 {{ request()->is('halaman-petugas') ? 'active' : '' }}"
                  href="{{ route('halaman-petugas') }}">Pendaftar</a>
                <a class="collapse-item {{ request()->is('halaman-buku') ? 'active' : '' }}"
                    href="{{ route('halaman-buku') }}">Buku</a>
                <a class="collapse-item {{ request()->is('halaman-anggota') ? 'active' : '' }}"
                    href="{{ route('halaman-anggota') }}">Anggota</a>
                <a class="collapse-item mb-1 {{ request()->is('halaman-peminjam') ? 'active' : '' }}"
                    href="{{ route('halaman-peminjam') }}">Peminjam</a>
                    <a class="collapse-item mb-1 {{ request()->is('halaman-pengarang') ? 'active' : '' }}"
                        href="{{ route('halaman-pengarang') }}">Pengarang</a>
                        <a class="collapse-item mt-1 {{ request()->is('halaman-penerbit') ? 'active' : '' }}"
                            href="{{ route('halaman-penerbit') }}">Penerbit</a>
                            <a class="collapse-item mt-1 {{ request()->is('halaman-genre') ? 'active' : '' }}"
                                href="{{ route('halaman-genre') }}">Genre</a>
                                <a class="collapse-item mb-1 {{ request()->is('history-peminjam') ? 'active' : '' }}"
                                    href="{{ route('history-peminjam') }}">History</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="/logout" onclick="return confirmLogout()">
        <i class="fas fa-arrow-right"></i>
        <span>Logout</span>
    </a>
</li>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.2/dist/sweetalert2.min.js"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin logout?',
            text: 'Anda akan keluar dari akun ini.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/logout';
            }
        });

        return false;
    }
</script>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
