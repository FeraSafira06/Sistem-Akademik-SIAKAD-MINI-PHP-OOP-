<?php
require_once "User.php";
require_once "CetakLaporan.php";

class Mahasiswa extends User implements CetakLaporan {
    private $nim;
    private $nilai = [];

    public function __construct($nama, $nim) {
        parent::__construct($nama);
        $this->nim = $nim;
    }

    public function tambahNilai($matkul, $nilai) {
        $this->nilai[$matkul] = $nilai;
    }

    public function hitungIPK() {
        if (count($this->nilai) == 0) return 0;
        return array_sum($this->nilai) / count($this->nilai);
    }

    public function cetak() {
        echo "<h3>KHS Mahasiswa</h3>";
        echo "Nama: $this->nama <br>";
        echo "NIM: $this->nim <br>";
        echo "Nilai:<br>";

        foreach ($this->nilai as $matkul => $nilai) {
            echo "$matkul : $nilai <br>";
        }

        echo "IPK: " . $this->hitungIPK();
    }

    public function info() {
        return "Mahasiswa: $this->nama";
    }
}