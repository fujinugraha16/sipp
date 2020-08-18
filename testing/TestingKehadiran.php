<?php

use PHPUnit\Framework\TestCase;

// function yang ditest
require_once('helper/function.php');

class TestingKehadiran extends TestCase
{
    public function fetchData()
    {
        $bulan = 'Juni';
        $tahun = 2020;

        $arr = fetchKehadiran($bulan, $tahun);

        $this->assertNotEquals(0, count($arr));
    }

    /** @test */
    public function orderData()
    {
        $column = 'nik';
        $bulan = 'Juni';
        $tahun = 2020;

        $arr = orderDataKehadiran($column, $bulan, $tahun);

        $this->assertNotEquals(0, count($arr));
    }
}
