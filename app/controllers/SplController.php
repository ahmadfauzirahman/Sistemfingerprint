<?php

class SplController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $spl = Spl::find(['order' => 'idSpl DESC']);
        $this->view->spl = $spl;
    }

    public function splnewAction()
    {
        $tanggallembur = $this->request->getPost('tanggallembur');
        $nip = $this->request->getPost('nip');
        $datapegawai = Pegawai::findFirstByNip($nip);
        if ($tanggallembur <= date('Y-m-d')) {
            $this->flashSession->error("Pembuatan SPL Tidak Bisa Karena Tanggal Lembur Sudah Lewat Dari Tanggal Sekarang");
            $this->response->redirect('spl/index');
        } else {
            $model = new Spl();
            $model->nip = $nip;
            $model->tanggallembur = $tanggallembur;
            $model->jammulai = $this->request->getPost('jammulai');
            $model->jamselesai = $this->request->getPost('jamselesai');
            $model->jabatan = $datapegawai->jabatan;
            $model->jenislembur = $this->request->getPost('jenislembur');
            $model->keterangan = $this->request->getPost('keterangan');
            $model->status = 'Belum Konfirmasi';
            $model->tanggal_surat = date('Y-m-d');
            $save = $model->save();
            if ($save) {
                $this->flashSession->success("SPL berhasil dibuat, dan menunggu konfirmasi dari karyawan");
                $this->response->redirect('spl/index');
            } else {
                $this->flashSession->error("SPL Tidak Berhasil Dibuat");
                $this->response->redirect('spl/index');
            }
        }
    }

    public function detailAction($id)
    {
        $data = Spl::find(['conditions' => "nip like '$id'",
            'order' => "nip DESC"]);
        $this->view->data = $data;
    }

    public function updatestatusAction($nip, $id)
    {
        $data = Spl::findFirstByIdSpl($id);

        $data->status = 'Konfirmasi Selesai';
        $data->save();

        $this->flashSession->success('Berhasil Mengubah Status');
        $this->response->redirect('spl/detail/' . $nip);
    }
}

