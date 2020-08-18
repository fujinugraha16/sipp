<?php require_once('config/config.php') ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="/">SIPP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= $url ?>/">Home</a>
                <a class="nav-link" href="<?= $url ?>/pegawai.php">Pegawai</a>
                <a class="nav-link" href="<?= $url ?>/kehadiran.php">Kehadiran</a>
                <a class="nav-link" href="<?= $url ?>/slip-gaji.php">Slip Gaji</a>
            </div>
        </div>
    </div>
</nav>