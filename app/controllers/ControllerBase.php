<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $id_session;

    public function initialize()
    {
        $this->id_session = $this->session->get('idPengguna');
        if (empty($this->id_session)) {
            $this->response->redirect('session/login');
        }
    }


}
