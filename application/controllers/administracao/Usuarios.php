<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    private $categorias;

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
    }

    public function index() {
        $this->load->library('table');
        $dados['usuarios'] = $this->modelusuarios->listar();
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/usuarios', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }

    public function efetuar_login() {
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $login = $this->modelusuarios->efetuar_login($usuario, $senha);
        if (count($login) === 1) {
            $sessao = array('login' => true, 'id_usuario' => $login[0]->id, 'usuario' => $login[0]->login);
            $this->session->set_userdata($sessao);
            redirect(base_url('administracao'));
        } else {
            redirect(base_url('administracao/login'));
        }
    }

    public function adicionar() {
        $usuario = $this->input->post('login');
        $senha = $this->input->post('senha');
        $this->modelusuarios->adicionar_usuario($usuario, $senha);
        redirect(base_url('administracao/usuarios'));
    }

    public function exibir_usuario($usuario) {
        $dados['usuario'] = $this->modelusuarios->exibir($usuario);
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/usuario', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }

    public function alterar($id) {
        $usuario = $this->input->post('login');
        $senha = $this->input->post('senha');
        $this->modelusuarios->alterar_usuario($id, $usuario, $senha);
        redirect(base_url('administracao/usuarios'));
    }
    public function excluir($id){
        $this->modelusuarios->excluir($id);
        redirect(base_url('administracao/usuarios'));
    }
    public function sem_permissao() {
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/sem_permissao');
        $this->load->view('administracao/html_footer');
    }

    public function logout() {
        if (!$this->session->login && !$this->session->id_usuario && !$this->session->usuario) {
            redirect(base_url("administracao/login"));
        } else {
            $this->session->sess_destroy();
            redirect(base_url("administracao/login"));
        }
    }

    public function permissoes($usuario) {
        $this->load->library('table');
        $dados['usuarios'] = $usuario;
        $dados['permissoes'] = $this->modelusuarios->listar_permissoes_usuario($usuario);
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/permissoes', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }

    public function alterar_permissoes() {
        $usuario = $this->input->post("usuario");
        $metodo = $this->input->post("metodo");
        if ($this->modelusuarios->alterar_permissoes_usuario($usuario, $metodo)) {
            redirect(base_url('administracao/usuarios/permissoes/' . $usuario));
        } else {
            echo 'Não foi possível alterar as permissões do usuário.';
        }
    }

}
