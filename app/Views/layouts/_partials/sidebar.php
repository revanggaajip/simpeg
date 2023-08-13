<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= route_to('dashboard.index'); ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class="bx bx-user text-primary bx-md"></i>
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
        <?php if (session('role') == 'admin') { ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Admin</span>
        </li>
        <!-- Pengguna / Pegawai-->
        <li class="menu-item <?= $title == 'Pegawai' ? 'active' : null ?>">
            <a href="<?= route_to('pengguna.index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Pegawai</div>
            </a>
        </li>
        <li class="menu-item <?= $title == 'Cuti Pegawai' ? 'active' : null ?>">
            <a href="/cuti" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Analytics">Cuti Pegawai</div>
            </a>
        </li>
        <li class="menu-item <?= $title == 'Penggajian Pegawai' ? 'active' : null ?>">
            <a href="/gaji" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Penggajian Pegawai</div>
            </a>
        </li>
        <?php } ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>
        <?php
        if (session('role') == 'admin') { ?>
            <li class="menu-item <?= $title == 'Profil' . session('nama') ? 'active' : null ?>">
                <a href="<?= route_to('pengguna.detail', session('id')); ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Profil</div>
                </a>
            </li>
        <?php } ?>
        <li class="menu-item <?= $title == 'Pengajuan Cuti' ? 'active' : null ?>">
            <a href="/cuti/<?= session('id'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Analytics">Pengajuan Cuti</div>
            </a>
        </li>
        <li class="menu-item <?= $title == 'Riwayat Jabatan' ? 'active' : null ?>">
            <a href="/jabatan/<?= session('id'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bookmark"></i>
                <div data-i18n="Analytics">Riwayat Jabatan</div>
            </a>
        </li>
        <li class="menu-item <?= $title == 'Anggota Keluarga' ? 'active' : null ?>">
            <a href="/keluarga/<?= session('id'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Anggota Keluarga</div>
            </a>
        </li>

        <li class="menu-item <?= $title == 'Riwayat Pendidikan' ? 'active' : null ?>">
            <a href="/pendidikan/<?= session('id'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Analytics">Riwayat Pendidikan</div>
            </a>
        </li>

        <li class="menu-item <?= $title == 'Riwayat Gaji' ? 'active' : null ?>">
            <a href="/gaji/detail/<?= session('id'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Riwayat Gaji</div>
            </a>
        </li>

        <li class="menu-item <?= $title == 'Berkas Penunjang' ? 'active' : null ?>">
            <a href="/berkas/detail/<?= session('id'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-upload"></i>
                <div data-i18n="Analytics">Berkas Penunjang</div>
            </a>
        </li>
    </ul>
</aside>