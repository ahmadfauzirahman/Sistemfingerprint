<?php

class ApiController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {


        $data = Pengguna::find(['order' => 'namatenagakerja ASC']);
        $response = null;
        if ($data) {
            $response = [
                "success" => "berhasil",
                "data" => $data
            ];
        } else {
            $response = [
                "success" => "gagal"
            ];
        }
        return json_encode($response);
    }

    public function pegawaiAction()
    {
        $data = Pegawai::find(['order' => 'namaKtp ASC']);
        $response = null;
        if ($data) {
            $response = [
                "success" => "berhasil",
                "data" => $data
            ];
        } else {
            $response = [
                "success" => "gagal"
            ];
        }
        return json_encode($response);
    }

    public function absenAction()
    {
        $data = Absen::find(['order' => 'namapegawai ASC']);
        $response = null;
        if ($data) {
            $response = [
                "success" => "berhasil",
                "data" => $data
            ];
        } else {
            $response = [
                "success" => "gagal"
            ];
        }
        return json_encode($response);
    }

    public function insertAction($id)
    {
        $data = Pegawai::findFirstByNip($id);
        $model = new Absen();
        $nip = $data->nip;
        $nama = $data->namaKtp;
        $jabatan = $data->jabatan;
        $tanggal = date('Y-m-d');
        $hari = $this->tanggal(date('Y-m-d'));

        $model->nippegawai = $nip;
        $model->namapegawai = $nama;
        $model->jabatan = $jabatan;
        $model->tanggal = $tanggal;
        $model->hari = $hari;
        $model->jabatan = $data->jabatan;
        if ($data->gol == 'I') {
            $gaji = 2517000 / 22;
        } elseif ($data->gol == 'II') {
            $gaji = 2540000 / 22;
        } elseif ($data->gol == 'III') {
            $gaji = 2517000 / 22;
        } elseif ($data->gol == 'IV') {
            $gaji = 3575000 / 22;
        } else {
            "Nol";
        }
        $model->gaji = $gaji;
        $save = $model->save();
        $response = null;
        if ($save) {
            $response = [
                "success" => "berhasil",
            ];
        } else {
            $response = [
                "success" => "gagal"
            ];
        }
        return json_encode($response);
    }

    function tanggal($tanggal)
    {

        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        return $dayList[$day];
    }

    function tanggal_indo($tanggal)
    {
        $bulan = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }

}

