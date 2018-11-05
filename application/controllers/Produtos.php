<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    private $produtos;
    public function __construct() {
        parent::__construct();
        $this->load->model('produtos_model', 'modelprodutos');
        $this->load->model('categorias_model', 'modelcategorias');
        $this->produtos = $this->modelprodutos->listar_produtos();
    }
    public function index(){
        $this->load->helper('text');
        $data_header['produtos'] = $this->produtos;
        $data_pagina['produtos'] = $this->produtos;
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('produtos', $data_pagina);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    public function produto($id, $slug = null){
        $this->load->helper("text");
        $data_header['produto'] = $this->produtos;
        $data_pagina['produto'] = $this->modelprodutos->detalhes_produtos($id);
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('produto', $data_pagina);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
}
