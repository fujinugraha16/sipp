<?php

use PHPUnit\Framework\TestCase;

// function yang ditest
require_once('helper/function.php');

class TestingPegawai extends TestCase
{
    public function fetchData()
    {
        $arr = fetchDataPegawai();

        $this->assertNotEquals(0, count($arr));
    }


    public function insertData()
    {
        $nama = 'Fuji';
        $nik = 10000;
        $jk = 'Laki-laki';
        $alamat = 'Tasikmalaya';
        $jabatan_id = 5;
        $status = 'Menikah';
        $jumlah_anak = 2;

        $res = insertPegawai($nama, $nik, $jk, $alamat, $jabatan_id, $status, $jumlah_anak);

        $this->assertEquals(1, $res);
    }

    public function updateData()
    {
        $id = 20;
        $nama = 'Fuji';
        $nik = 10000;
        $jk = 'Laki-laki';
        $alamat = 'Tasikmalaya';
        $jabatan_id = 5;
        $status = 'Menikah';
        $jumlah_anak = 2;

        $res = updatePegawai($id, $nama, $nik, $jk, $alamat, $jabatan_id, $status, $jumlah_anak);

        $this->assertEquals(1, $res);
    }


    public function deleteData()
    {
        $id = 20;

        $res = deletePegawai($id);

        $this->assertEquals(1, $res);
    }

    /** @test */
    public function searchData()
    {
        $keyword = 'Direktur';

        $arr = searchPegawai($keyword);

        $this->assertNotEquals(0, count($arr));
    }
}
