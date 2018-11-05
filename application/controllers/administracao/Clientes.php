<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('clientes_model', 'modelclientes');
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
    }
    public function index() {
        $this->load->library('table');
        $dados['clientes'] = $this->modelclientes->listar($this->input->post('filtro'));
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/clientes', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    public function detalhes($cliente) {
        $dados['cliente'] = $this->modelclientes->detalhes_cliente($cliente);
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/detalhes', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    public function excluir($cliente) {
        $this->modelclientes->excluir($cliente);
        redirect(base_url('administracao/clientes'));
    }

}
