<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $categorias;
    public function __construct() {
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->load->model('produtos_model', 'modelprodutos');
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        $this->categorias = $this->modelcategorias->listar_categorias();
    }

    public function index() {
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/home');
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    public function login(){
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/login');
        $this->load->view('administracao/html_footer');
    }
}
