<?php
class MataKuliah {

    public static function getAll(){
        if(!isset($_SESSION['data_mk'])){
            $_SESSION['data_mk'] = [
                [
                    "kode"=>"MK001",
                    "nama"=>"Pemrograman Berorientasi Objek",
                    "sks"=>3,
                    "semester"=>3,
                    "jurusan"=>"Bisnis Digital"
                ],
                [
                    "kode"=>"MK002",
                    "nama"=>"Basis Data",
                    "sks"=>3,
                    "semester"=>3,
                    "jurusan"=>"Bisnis Digital"
                ],
                [
                    "kode"=>"MK003",
                    "nama"=>"Visualisasi Keputusan Bisnis",
                    "sks"=>2,
                    "semester"=>5,
                    "jurusan"=>"Produksi Media"
                ],
                [
                    "kode"=>"MK004",
                    "nama"=>"Bahasa Indonesia",
                    "sks"=>2,
                    "semester"=>1,
                    "jurusan"=>"Umum"
                ]
            ];
        }
        return $_SESSION['data_mk'];
    }

    public static function tambah($data){
        $_SESSION['data_mk'][] = $data;
    }

    public static function hapus($kode){
        foreach($_SESSION['data_mk'] as $i => $m){
            if($m['kode']==$kode){
                unset($_SESSION['data_mk'][$i]);
            }
        }
    }

    public static function getByKode($kode){
        foreach($_SESSION['data_mk'] as $m){
            if($m['kode']==$kode){
                return $m;
            }
        }
    }

    public static function update($kode, $dataBaru){
        foreach($_SESSION['data_mk'] as $i => $m){
            if($m['kode']==$kode){
                $_SESSION['data_mk'][$i] = $dataBaru;
            }
        }
    }
}