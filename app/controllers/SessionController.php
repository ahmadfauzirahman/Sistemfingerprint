<?php

class SessionController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $username = $this->request->getPost('nip');
            $password = $this->request->getPost('password');
            $pengguna = Pengguna::findFirstByNip($username);
            if ($pengguna) {
                if ($pengguna->nip == $username && $pengguna->password == $password) {
                    $this->session->set('idPengguna', $pengguna->idPengguna);
                    $this->session->set('nip', $pengguna->nip);
                    $this->session->set('password', $pengguna->password);
                    $this->session->set('namatenagakerja', $pengguna->namatenagakerja);
                    $this->session->set('hak', $pengguna->hak_akses);
                    $this->flashSession->success("Halo Selamat Datang $username");
                    $this->response->redirect('index');
                } elseif ($pengguna->nip != $username || $pengguna->password != $password) {
                    $this->flashSession->error('Username atau Password Salah');
                    $this->response->redirect('');
                }
            } else {
                $this->flashSession->error('Akun Tidak Ada, Atau Tidak AKtif');
                $this->response->redirect('');
            }
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('session/login');
    }

}

