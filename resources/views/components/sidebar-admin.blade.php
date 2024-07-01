<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-th-large"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('admin/bayar*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.bayar.index') }}"><i class="fas fa-th-large"></i>
                    <span>Bayar</span></a>
            </li>
            <li class="{{ Request::is('admin/biaya*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.biaya.index') }}"><i class="fas fa-th-large"></i>
                    <span>Biaya</span></a>
            </li>
            <li class="{{ Request::is('admin/blok*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.blok.index') }}"><i class="fas fa-th-large"></i>
                    <span>Blok</span></a>
            </li>
            <li class="{{ Request::is('admin/daftar*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.daftar.index') }}"><i class="fas fa-th-large"></i>
                    <span>Daftar</span></a>
            </li>
            <li class="{{ Request::is('admin/gaji*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.gaji.index') }}"><i class="fas fa-th-large"></i>
                    <span>Gaji</span></a>
            </li>
            <li class="{{ Request::is('admin/harga_makam*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.harga_makam.index') }}"><i class="fas fa-th-large"></i>
                    <span>Harga Makam</span></a>
            </li>
            <li class="{{ Request::is('admin/jenazah*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.jenazah.index') }}"><i class="fas fa-th-large"></i>
                    <span>Jenazah</span></a>
            </li>
            <li class="{{ Request::is('admin/lokasi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.lokasi.index') }}"><i class="fas fa-th-large"></i>
                    <span>Lokasi</span></a>
            </li>
            <li class="{{ Request::is('admin/pekerja*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pekerja.index') }}"><i class="fas fa-th-large"></i>
                    <span>Pekerja</span></a>
            </li>
            <li class="{{ Request::is('admin/proses_makam*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.proses_makam.index') }}"><i class="fas fa-th-large"></i>
                    <span>Proses Makam</span></a>
            </li>
            <li class="{{ Request::is('admin/rawat*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.rawat.index') }}"><i class="fas fa-th-large"></i>
                    <span>Rawat</span></a>
            </li>
        </ul>
    </aside>
</div>
