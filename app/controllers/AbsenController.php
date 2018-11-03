<?php

class AbsenController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $data = Absen::find(['order' => 'idabsen DESC']);
        $this->view->data = $data;
    }


    public function insertabsenAction()
    {

    }

    public function detailAction($nip)
    {

        $data = Absen::find(['conditions' => "nippegawai like '$nip'"]);
        $this->view->data = $data;
        if ($this->request->isPost()) {

            $id = Pegawai::findFirstByNip($nip);
            $model = new Absen();
            $model->nippegawai = $nip;
            $model->namapegawai = $this->request->getPost('nama');
            $model->tanggal = $this->request->getPost('tanggal');
            $model->hari = $this->request->getPost('hari');
            $model->jabatan = $id->jabatan;
            if ($id->gol == 'I') {
                $gaji = 2517000 / 22;
            } elseif ($id->gol == 'II') {
                $gaji = 2540000 / 22;
            } elseif ($id->gol == 'III') {
                $gaji = 2517000 / 22;
            } elseif ($id->gol == 'IV') {
                $gaji = 3575000 / 22;
            } else {
                "Nol";
            }
            $model->gaji = $gaji;
            $save = $model->save();
            if ($save) {
                $this->flashSession->success('Berhasil Absen');
                $this->response->redirect('absen/detail/' . $nip);
            } else {
                $this->flashSession->error('Tidak Berhasil Absen');
                $this->response->redirect('absen/detail/' . $nip);
            }

        }
    }
}

