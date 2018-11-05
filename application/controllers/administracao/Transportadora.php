<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transportadora extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transportadoras_model', 'modeltransportadora');
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        $this->load->library('table');
    }
    public function index(){
        $dados['faixas_fretes'] = $this->modeltransportadoras->tabela_fretes();
        $this->load->view('administracao/html-header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/transportadoras', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html-footer');
    }
}
