<?php
class Mahasiswa {

    private $nama;
    private $nim;
    private $nilai = [];

    // ===== OOP IPK =====
    public function __construct($nama = "", $nim = ""){
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function tambahNilai($mk, $nilai){
        $this->nilai[$mk] = $nilai;
    }

    public function hitungIPK(){
        if(count($this->nilai)==0) return 0;
        return array_sum($this->nilai)/count($this->nilai);
    }

    public function getNama(){ return $this->nama; }
    public function getNim(){ return $this->nim; }

    // ===== CRUD =====
    public static function getAll(){
        if(!isset($_SESSION['data_mhs'])){
            $_SESSION['data_mhs'] = [
                [
                    "nim"=>"123456",
                    "nama"=>"Fera Safira",
                    "jk"=>"Perempuan",
                    "tgl"=>"2003-02-03",
                    "jurusan"=>"Bisnis Digital",
                    "angkatan"=>"2022"
                ],
                [
                    "nim"=>"123457",
                    "nama"=>"Andi Saputra",
                    "jk"=>"Laki-laki",
                    "tgl"=>"2002-05-10",
                    "jurusan"=>"Manajemen Agribisnis",
                    "angkatan"=>"2021"
                ],
                [
                    "nim"=>"123458",
                    "nama"=>"Galaksi Andromeda",
                    "jk"=>"Laki-laki",
                    "tgl"=>"2005-01-01",
                    "jurusan"=>"Produksi Media",
                    "angkatan"=>"2025"
                ]
            ];
        }
        return $_SESSION['data_mhs'];
    }

    public static function tambah($data){
        $_SESSION['data_mhs'][] = $data;
    }

    public static function hapus($nim){
        foreach($_SESSION['data_mhs'] as $i => $m){
            if($m['nim']==$nim){
                unset($_SESSION['data_mhs'][$i]);
            }
        }
    }

    public static function getByNim($nim){
        foreach($_SESSION['data_mhs'] as $m){
            if($m['nim']==$nim){
                return $m;
            }
        }
    }

    public static function update($nim, $dataBaru){
        foreach($_SESSION['data_mhs'] as $i => $m){
            if($m['nim']==$nim){
                $_SESSION['data_mhs'][$i] = $dataBaru;
            }
        }
    }
}