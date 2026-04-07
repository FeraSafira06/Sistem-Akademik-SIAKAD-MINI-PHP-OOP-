<?php
class Nilai {
    private $matkul;
    private $nilai;

    public function __construct($matkul, $nilai) {
        $this->matkul = $matkul;
        $this->nilai = $nilai;
    }

    public function getNilai() {
        return $this->nilai;
    }

    public function getMatkul() {
        return $this->matkul;
    }
}