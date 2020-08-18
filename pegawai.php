<?php
include('./helper/function.php');
$pegawai = fetchDataPegawai();

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
        <h1 class="display-4 mt-4">List Pegawai</h1>
        <table id="table_pegawai" class="display">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Status</th>
                    <th>Jumlah Anak</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pegawai as $pg) : ?>
                    <tr>
                        <td><?= $pg['id'] ?></td>
                        <td><?= $pg['nama'] ?></td>
                        <td><?= $pg['jk'] ?></td>
                        <td><?= $pg['alamat'] ?></td>
                        <td><?= $pg['jabatan'] ?></td>
                        <td class="text-center"><?= $pg['golongan'] ?></td>
                        <td><span class="badge badge-success"><?= $pg['status'] ?></span></td>
                        <td class="text-center"><?= $pg['jumlah_anak'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <?php include_once('views/footer.php') ?>
</body>

</html>