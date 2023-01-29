<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= route_to('dashboard.index'); ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class="bx bx-plus-medical text-primary bx-md"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase"><?= config('App')->name; ?></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?= $title == lang('App.dashboard') ? 'active' : null ?>">
            <a href="<?= route_to('dashboard.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Obat</span>
        </li>
        <!-- Pengguna -->
        <li class="menu-item <?= $title == 'Master Obat' ? 'active' : null ?>">
            <a href="<?= route_to('pengguna.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-capsule"></i>
                <div data-i18n="Analytics">Master Obat</div>
            </a>
        </li>
        <!-- Pendaftar -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Account Settings">Penjualan Obat</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-account-settings-account.html" class="menu-link">
                        <div data-i18n="Account">Input Penjualan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-account-settings-notifications.html" class="menu-link">
                        <div data-i18n="Notifications">Data Penjualan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Kategori -->
        <li class="menu-item <?= $title == 'Stock Opname' ? 'active' : null ?>">
            <a href="<?= route_to('kriteria.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Penerimaan Obat</div>
            </a>
        </li>
        <!-- Kategori -->
        <li class="menu-item <?= $title == 'Stock Opname' ? 'active' : null ?>">
            <a href="<?= route_to('kriteria.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Analytics">Stock Opname</div>
            </a>
        </li>
        <!-- Penilaian -->
        <li class="menu-item <?= $title == 'Penilaian' ? 'active' : null ?>">
            <a href="<?= route_to('penilaian.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div data-i18n="Analytics">Riwayat Stock</div>
            </a>
        </li>
        <!-- laporan -->
        <li class="menu-item <?= $title == 'laporan' ? 'active' : null ?>">
            <a href="<?= route_to('laporan.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Analytics">Laporan</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Penunjang</span>
        </li>
        <!-- Perhitungan -->
        <li class="menu-item <?= $title == 'Pengguna' ? 'active' : null ?>">
            <a href="<?= route_to('pengguna.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Analytics">Pengguna</div>
            </a>
        </li>
        <li class="menu-item <?= $title == 'Pengaturan' ? 'active' : null ?>">
            <a href="<?= route_to('pengguna.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">Pengaturan</div>
            </a>
        </li>
    </ul>
</aside>