<?php

class BpjsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $data = $this->modelsManager->
        createQuery("SELECT * FROM Pegawai WHERE 
            gol BETWEEN 'I' and 'II' ")->execute();
        $this->view->data = $data;
    }

    public function gajidetailAction($nip)
    {

        # $data memanggil data pegawai dari tabel pegawai #
        $data = Pegawai::findFirstByNip($nip);
        # $dataAbse memanggil data absen #
        $dataAbsen = Absen::findFirstByNippegawai($nip);


        $dok = preg_replace('/[^A-Za-z0-9\  ]/', "", $data->gajiPokok);

        # HITUNGAN TUNJANGAN PPH21 #
        $statuspegawai = $data->status;


        $dataSpl = Spl::find(['conditions' => "nip like '$nip'"]);
        // pengurungan untuk uiran perusahaan

        // 1. iuran jjk
        $iuranjjk = $dok * 0.89;

        $iuranjkm = $dok * 0.30;

        $iuranpensiunprsh = $dok * 0.02;

        $iuranpensiuntk = $dok * 0.01;

        $iuranpensiunjhttk = $dok * 0.02;

        $iuranpensiunjhtprsh = $dok * 3.70;

//        echo "<pre>";
        echo $v1 = substr($iuranjjk, 0, 5) . "<br>";
        if ($data->gol == 'I' || $data->gol == 'II') {
            echo $v2 = substr($iuranjkm, 0, 4) . "<br>";
        } else {
            echo $v2 = substr($iuranjkm, 0, 5) . "<br>";

        }
        echo $v3 = substr($iuranpensiunprsh, 0, 5) . "<br>";

        echo $v4 = substr($iuranpensiunjhttk, 0, 5) . "<br>";

        echo $v5 = substr($iuranpensiunjhtprsh, 0, 5) . "<br>";

        echo $v6 = substr($iuranpensiuntk, 0, 5) . "<br>";

        echo $total = $v1 + $v2 + $v3 + $v4 + $v5 + $v6;


        echo "</br>";
        // 2. bpjs
        $tk = $dok * 0.01;
        $prsh = $dok * 0.04;

        echo $v7 = substr($tk, 0, 5) . "<br>";
        echo $v8 = substr($prsh, 0, 6) . "<br>";
        echo $totalbpsj = $v7 + $v8;

        $this->view->setVars([
            'v1' => $v1,
            'v2' => $v2,
            'v3' => $v3,
            'v4' => $v4,
            'v5' => $v5,
            'v6' => $v6,
            'v7' => $v7,
            'v8' => $v8,
            'gaji' => $dok,
            'totalbpsj' => $totalbpsj,
            'total' => $total,
            'dataPegawai' => $data,
            'dataAbsen' => $dataAbsen,
            'dataSpl' => $dataSpl
        ]);

    }

    public function gol3Action()
    {
        $data = $this->modelsManager->createQuery("SELECT * FROM Pegawai WHERE gol BETWEEN 'III' and 'IV' ")->execute();
        $this->view->setVars([
            "data" => $data
        ]);
    }

    public function alllemburAction()
    {
        $dataLembur = Spl::find(['order' => "idSpl DESC"]);
        $this->view->setVars([
            "data" => $dataLembur
        ]);
    }

}

