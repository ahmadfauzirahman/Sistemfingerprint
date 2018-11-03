<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $nip = $this->session->get('nip');
        $dataspl = $this->modelsManager->createQuery("SELECT count (nip)FROM Spl where nip = '$nip' and status ='Belum Dikonfirmasi'")->execute();
        $dataspl = count($dataspl);
        $this->view->dataspl = $dataspl;
        $this->flashSession->success("Anda  Terhubung Ke dengan Mesin");
    }

    public function pegawaiAction()
    {
        $data = Pengguna::find(['order' => "idPengguna DESC"]);
        $this->view->data = $data;
    }

    public function inabsenAction()
    {
        $model = new Absen();

    }

    public function tunjunganAction()
    {
        $data = Tunjangan::find(['order' => 'idtunjangan ASC']);
        $this->view->data = $data;
        if ($this->request->isPost()) {
            $namatunjangan = $this->request->getPost('nama');
            $jumlah = $this->request->getPost('jumlah');
            $status = $this->request->getPost('status');
            $model = new Tunjangan();
            $model->namatunjangan = $namatunjangan;
            $model->jumlahtunjangan = $jumlah;
            $model->status = $status;
            $save = $model->save();
            if ($save) {
                $this->flashSession->success("Berhasil Menambahkan Data");
                $this->response->redirect("index/tunjungan");
            } else {
                $this->flashSession->error("Tidak Berhasil Menambahkan Data");
                $this->response->redirect("index/tunjungan");
            }
        }
    }

    public function edittunjanganAction()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $jumlah = $this->request->getPost('jumlah');
        $status = $this->request->getPost('status');
        $data = Tunjangan::findFirstByIdtunjangan($id);
        $data->namatunjangan = $nama;
        $data->jumlahtunjangan = $jumlah;
        $status->status = $status;
        $save = $data->save();
        if ($save) {
            $this->flashSession->success("Berhasil Menambahkan Data");
            $this->response->redirect("index/tunjungan");
        } else {
            $this->flashSession->error("Tidak Berhasil Menambahkan Data");
            $this->response->redirect("index/tunjungan");
        }
    }

    public function lupaAction()
    {
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
        }
    }


}

