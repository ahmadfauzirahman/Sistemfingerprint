<?php

use Phalcon\Mvc\Model\Resultset;

class PegawaiController extends ControllerBase
{

    public function indexAction()
    {
        $data = Pegawai::find(['order' => 'idPegawai ASC']);
        $this->view->data = $data;

        if ($this->request->isPost()) {
            $filename = null;
            $tmp_name = null;
            foreach ($this->request->getUploadedFiles() as $uploadedFile) {
                $filename = $uploadedFile->getName();
                $tmp_name = $uploadedFile->getTempName();
            }

            //Import uploaded file ke Database, Letakan dibawah sini..

            $handle = fopen($tmp_name, "r"); //Membuka file dan membacanya
//        var_dump($handle);
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $pegawai = new Pegawai();
                $pegawai->save([
                    'nip' => $data[0],
                    'namaKtp' => $data[1],
                    'tglMulaiKerja' => $data[2],
                    'bulanMulai' => $data[3],
                    'bulanBerhenti' => $data[4],
                    'nik' => $data[5],
                    'npwp' => $data[6],
                    'status' => $data[7],
                    'jenisKelamin' => $data[8],
                    'tempatTanggaLahir' => $data[9],
                    'pendidikan' => $data[10],
                    'alamat' => $data[11],
                    'agama' => $data[12],
                    'jabatan' => $data[13],
                    'gol' => $data[14],
                    'gajiPokok' => $data[15],
                    'total' => $data[16],
                    'noRekeningMandiri' => $data[17]
                ]);
            }
            $this->flashSession->success('Data CSV berhasil di Input');
            $this->response->redirect('pegawai');
        }
    }

    public function checkAction($nip)
    {
        $data = Pegawai::findFirstByNip($nip);
        //simpan kedalam tabel pegawai
        $modelPengguna = new Pengguna();
        $modelPengguna->nip = $data->nip;
        $modelPengguna->password = $data->nip;
        $modelPengguna->namatenagakerja = $data->namaKtp;
        $modelPengguna->hak_akses = 'Pegawai';
        $modelPengguna->save();
        $data->validasi = 'Aktif';
        $data->save();
        $this->flashSession->success('Berhasil Mengaktifkan Pegawai');
        $this->response->redirect('pegawai/index');
    }

}

