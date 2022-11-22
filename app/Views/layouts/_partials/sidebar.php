<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= route_to('dashboard'); ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class="bx bx-credit-card-front text-primary bx-md"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2"><?= config('App')->name; ?></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>
        <!-- Dashboard -->
        <li class="menu-item <?= $title == lang('App.dashboard') ? 'active' : null ?>">
            <a href="<?= route_to('dashboard'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Pengguna -->
        <li class="menu-item <?= $title == 'Pengguna' ? 'active' : null ?>">
            <a href="<?= route_to('pengguna.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Pengguna</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Seleksi</span>
        </li>
        <!-- Kategori -->
        <li class="menu-item <?= $title == 'Kriteria' ? 'active' : null ?>">
            <a href="<?= route_to('kriteria.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-tag"></i>
                <div data-i18n="Analytics">Kriteria</div>
            </a>
        </li>
        <!-- Pendaftar -->
        <li class="menu-item <?= $title == 'Pendaftar' ? 'active' : null ?>">
            <a href="<?= route_to('pendaftar.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Analytics">Pendaftar</div>
            </a>
        </li>
        <!-- Penilaian -->
        <li class="menu-item <?= $title == 'Penilaian' ? 'active' : null ?>">
            <a href="<?= route_to('penilaian.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div data-i18n="Analytics">Penilaian</div>
            </a>
        </li>
        <!-- Perhitungan -->
        <li class="menu-item <?= $title == 'Perhitungan' ? 'active' : null ?>">
            <a href="<?= route_to('perhitungan.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calculator"></i>
                <div data-i18n="Analytics">Perhitungan / Seleksi</div>
            </a>
        </li>
        <!-- laporan -->
        <li class="menu-item <?= $title == 'laporan' ? 'active' : null ?>">
            <a href="<?= route_to('laporan.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bookmark"></i>
                <div data-i18n="Analytics">Laporan</div>
            </a>
        </li>
    </ul>
</aside>