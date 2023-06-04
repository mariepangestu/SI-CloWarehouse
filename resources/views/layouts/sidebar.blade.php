<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN Clo</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- <li class="nav-item active">
        <a class="nav-link" href="{{ route('barang') }}"> 
            <i class="fas fa-database"></i> 
            <span>Data Barang</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Barang</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('barang.index') }}">Data Barang</a>
                <a class="collapse-item" href="{{ route('kategoribarang.index') }}">Data Kategori Barang</a>
                <a class="collapse-item" href="{{ route('stokbarang.index') }}">Data Stok Barang</a>
            </div>
        </div>
    </li>
{{-- 
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('kategoribarang') }}"> 
            <i class="fas fa-list"></i>
            <span>Data Kategori Barang</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('stokbarang') }}"> 
            <i class="fas fa-box-open"></i>
            <span>Data Stok Barang</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Produksi</span>
        </a>
        <div id="collapse" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('produksi.index') }}">Data Produksi</a>
                <a class="collapse-item" href="{{ route('biayaproduksi.index') }}">Data Biaya Produksi</a>
                <a class="collapse-item" href="{{ route('bahanbaku.index') }}">Data Bahan Baku Produksi</a>
                <a class="collapse-item" href="{{ route('stokproduksi.index') }}">Data Stok Produksi</a>
            </div>
        </div>
    </li>
{{-- <li class="nav-item active">
        <a class="nav-link" href="{{ route('produksi') }}"> 
            <i class="fas fa-sign-language"></i>
            <span>Data Produksi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('biayaproduksi') }}"> 
            <i class="fas fa-money-bill-alt"></i>
            <span>Data Biaya Produksi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('bahanbaku') }}"> 
            <i class="fas fa-sign-language"></i>
            <span>Data Bahan Baku Produksi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('stokproduksi') }}"> 
            <i class="fas fa-box"></i>
            <span>Data Stok Produksi</span></a>
    </li>  --}}    

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('gudang.index') }}"> 
            <i class="fas fa-building"></i>
            <span>Gudang</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('outlet.index') }}"> 
            <i class="fas fa-shopping-bag"></i>
            <span>Outlet</span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('tenagakerja.index') }}"> 
            <i class="fas fa-users"></i>
            <span>Data Tenaga Kerja</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('pegawai.index') }}"> 
            <i class="fas fa-user-tie"></i>
            <span>Data Pegawai</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <p class="text-center mb-2"><strong>Clo Warehouse</strong> is packed with premium features, components, and more!</p>
    </div> --}}

</ul>