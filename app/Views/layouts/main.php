<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $this->renderSection('title') ?> - <?= config('App')->name; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/library/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/library/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>/library/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>/css/demo.css" />

    <!-- librarys CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/library/libs/sweetalert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/library/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <?= $this->renderSection('styles'); ?>

    <!-- Helpers -->
    <script src="<?= base_url() ?>/library/js/helpers.js"></script>
    <script src="<?= base_url() ?>/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?= $this->include('layouts/_partials/sidebar') ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?= $this->include('layouts/_partials/navbar') ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php if (!empty($errors = session()->getFlashdata('errors'))) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>
                        <?= $this->renderSection('content'); ?>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?= $this->include('layouts/_partials/footer') ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js library/js/core.js -->
    <script src="<?= base_url() ?>/library/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/library/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>/library/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>/library/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>/library/libs/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/library/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="<?= base_url() ?>/js/main.js"></script>

    <!-- Page JS -->
    <?= $this->renderSection('scripts'); ?>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
    $(document).ready(() => {
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
        });
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= session()->getFlashdata('error') ?>',
        });
        <?php endif ?>
    });
    </script>
</body>

</html>