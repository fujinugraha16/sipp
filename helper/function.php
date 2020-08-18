<?php
require('config/config.php');


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// * GET DATA PEGAWAI
function fetchDataPegawai()
{
    return query("SELECT a.id, a.nama, a.nik, a.jk, a.alamat, b.nama AS jabatan, b.golongan_id AS golongan , a.status, a.jumlah_anak 
                  FROM pegawai AS a, jabatan AS b
                  WHERE a.jabatan_id = b.id");
}

// * INSERT DATA PEGAWAI
function insertPegawai($nama, $nik, $jk, $alamat, $jabatan_id, $status, $jumlah_anak)
{
    global $conn;

    mysqli_query($conn, "INSERT INTO pegawai(nama, nik, jk, alamat, jabatan_id, status, jumlah_anak) VALUES ('$nama', $nik, '$jk', '$alamat', '$jabatan_id', '$status', '$jumlah_anak')");
    return mysqli_affected_rows($conn);
}

// * UPDATE DATA PEGAWAI
function updatePegawai($id, $nama, $nik, $jk, $alamat, $jabatan_id, $status, $jumlah_anak)
{
    global $conn;

    mysqli_query($conn, "UPDATE pegawai SET nama='$nama', nik=$nik, jk='$jk', alamat='$alamat', jabatan_id='$jabatan_id', status='$status', jumlah_anak='$jumlah_anak' WHERE id=$id");
    return mysqli_affected_rows($conn);
}

// * DELETE DATA PEGAWAI
function deletePegawai($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pegawai WHERE id=$id");
    return mysqli_affected_rows($conn);
}

// * SEARCH DATA PEGAWAI
function searchPegawai($keyword)
{
    return query("SELECT a.id, a.nama, a.nik, a.jk, a.alamat, b.nama AS jabatan, b.golongan_id AS golongan , a.status, a.jumlah_anak 
                  FROM pegawai AS a, jabatan AS b
                  WHERE a.jabatan_id = b.id
                  AND a.nik LIKE '%$keyword%' OR b.nama LIKE '%$keyword%' OR b.golongan_id LIKE '%$keyword%'");
}

// * ORDER DATA KEHADIRAN
function orderDataKehadiran($column, $bulan, $tahun)
{
    if ($column === 'nik') {
        return query("SELECT a.id, b.nik , b.nama, b.jabatan_id, a.masuk, a.sakit, a.izin, a.alpa, a.lembur 
                  FROM kehadiran AS a, pegawai AS b 
                  WHERE a.pegawai_id = b.id 
                  AND a.bulan = '$bulan' AND a.tahun = $tahun
                  ORDER BY b.nik");
    } else if ($column === 'masuk') {
        return query("SELECT a.id, b.nik , b.nama, b.jabatan_id, a.masuk, a.sakit, a.izin, a.alpa, a.lembur 
                  FROM kehadiran AS a, pegawai AS b 
                  WHERE a.pegawai_id = b.id 
                  AND a.bulan = '$bulan' AND a.tahun = $tahun
                  ORDER BY a.masuk");
    } else if ($column === 'lembur') {
        return query("SELECT a.id, b.nik , b.nama, b.jabatan_id, a.masuk, a.sakit, a.izin, a.alpa, a.lembur 
                  FROM kehadiran AS a, pegawai AS b 
                  WHERE a.pegawai_id = b.id 
                  AND a.bulan = '$bulan' AND a.tahun = $tahun
                  ORDER BY a.lembur");
    }
}

// * GET DATA KEHADIRAN
function fetchKehadiran($bulan, $tahun)
{
    return query("SELECT a.id, b.id AS nip , b.nama, b.jabatan_id, a.masuk, a.sakit, a.izin, a.alpa, a.lembur 
                  FROM kehadiran AS a, pegawai AS b 
                  WHERE a.pegawai_id = b.id 
                  AND a.bulan = '$bulan' AND a.tahun = $tahun");
}
