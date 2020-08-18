<?php
include('helper/function.php');

if (isset($_GET['submit'])) {
    $kehadiran = fetchKehadiran($_GET['bulan'], $_GET['tahun']);
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include_once('views/header.php') ?>

<body>
    <!-- Navbar -->
    <?php include_once('views/navbar.php') ?>

    <!-- Content -->
    <div class="container">
        <h1 class="display-4 mt-4">List Kehadiran</h1>
        <form action="" method="get">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <select class="form-control" name="bulan" id="bulan">
                            <?php if (isset($_GET['submit'])) : ?>
                                <option value="<?= $_GET['bulan'] ?>"><?= $_GET['bulan'] ?></option>
                            <?php endif; ?>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="tahun" id="tahun">
                            <?php if (isset($_GET['submit'])) : ?>
                                <option><?= $_GET['tahun'] ?></option>
                            <?php endif; ?>
                            <option>2020</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" name="submit" class="btn btn-primary" value="true">Filter</button>
                </div>
                <?php if (isset($_GET['submit'])) : ?>
                    <div class="col-2 ml-auto p-0">
                        <button type="button" name="submit" class="btn btn-primary" style="width: 100%">Tambah Kehadiran</button>
                    </div>
                <?php endif; ?>
            </div>
        </form>

        <?php if (isset($_GET['submit'])) : ?>
            <h3 class="m-0 mt-3"><?= $_GET['bulan'] . ' ' . $_GET['tahun'] ?></h3>
            <?php if (count($kehadiran)) : ?>
                <table id="table_kehadiran" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Masuk</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Alpa</th>
                            <th>Lembur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kehadiran as $khd) : ?>
                            <tr>
                                <td><?= $khd['id'] ?></td>
                                <td><?= $khd['nip'] ?></td>
                                <td><?= $khd['nama'] ?></td>
                                <td><?= $khd['jabatan_id'] ?></td>
                                <td><?= $khd['masuk'] ?> <span class="badge badge-primary">hari</span></td>
                                <td><?= $khd['sakit'] ?> <span class="badge badge-primary">hari</span></td>
                                <td><?= $khd['izin'] ?> <span class="badge badge-primary">hari</span></td>
                                <td><?= $khd['alpa'] ?> <span class="badge badge-primary">hari</span></td>
                                <td class="text-right"><?= $khd['lembur'] ?> <span class="badge badge-success">jam</span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h5 class="m-0 mt-2 text-muted">Data tidak ditemukan</h5>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <?php include_once('views/footer.php') ?>
</body>

</html>