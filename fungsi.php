<?php

class menu
{
    public $jajangmyeon;
    public $tteokbokki;
    public $kimbap;
    public $jmlJajangmyeon;
    public $jmlTteokbokki;
    public $jmlKimbap;
    public $hargaJajangmyeon;
    public $hargaTteokbokki;
    public $hargaKimbap;
    public $totalSeluruh;
    public $totalHargaJajangmyeon;
    public $totalHargaTteokbokki;
    public $totalHargaKimbap;


    function __construct()
    {
        $this->hargaJajangmyeon = 45000;
        $this->hargaTteokbokki = 41000;
        $this->hargaKimbap = 37000;
    }
}

class Jumlah extends menu
{
    public function getJumlah($jmlJajangmyeon, $jmlTteokbokki, $jmlKimbap)
    {
        $this->jmlJajangmyeon = $jmlJajangmyeon;
        $this->jmlTteokbokki = $jmlTteokbokki;
        $this->jmlKimbap = $jmlKimbap;
    }

    public function setHarga()
    {
        $this->totalHargaJajangmyeon = $this->hargaJajangmyeon * $this->jmlJajangmyeon;
        $this->totalHargaTteokbokki = $this->hargaTteokbokki * $this->jmlTteokbokki;
        $this->totalHargaKimbap = $this->hargaKimbap * $this->jmlKimbap;
        $this->totalSeluruh = $this->totalHargaJajangmyeon + $this->totalHargaTteokbokki + $this->totalHargaKimbap;
    }
    public function cetakStruk()
    {
        echo "*** <b>$ Korean fo0d $</b> ***";
        echo "<br>";
        echo "Jajangmyeon: $this->jmlJajangmyeon x Rp. $this->hargaJajangmyeon: <b>$this->totalHargaJajangmyeon</b>";
        echo "<br>";
        echo "Tteokbokki : $this->jmlTteokbokki x Rp. $this->hargaTteokbokki: <b>$this->totalHargaTteokbokki</b>";
        echo "<br>";
        echo "Kimbap : $this->jmlKimbap x Rp. $this->hargaKimbap: <b>$this->totalHargaKimbap</b>";
        echo "<br><br>";
        echo "Total Payment Rp. <b>$this->totalSeluruh</b>";
        echo "<br>";
        echo "**************";
    }
}
