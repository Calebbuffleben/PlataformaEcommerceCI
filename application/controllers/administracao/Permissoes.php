<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('permissoes_model', 'modelpermissoes');
        $this->load->model('usuarios_model', 'modelusuarios');
    }

    public function index() {
        //se o usuário tem permissão, acessa a view se o nome da permissão for igual a do model
        if ($this->modelusuarios->temPermissao('ver_permissoes')) {
            $this->load->view('administracao/html_header');
            $this->load->view('administracao/header');
            $this->load->view('administracao/perm');
            $this->load->view('administracao/footer');
            $this->load->view('administracao/html_footer');
        }  else {
            redirect(base_url('administracao/home'));
        }
    }

}
