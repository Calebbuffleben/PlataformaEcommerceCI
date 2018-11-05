<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function adicionar_usuario($usuario, $senha) {
        $dados['login'] = $usuario;
        $dados['senha'] = $senha;
        $this->db->where('login', $usuario);
        $this->db->where('senha', $senha);
        $this->db->insert('usuarios', $dados);
    }

    public function listar() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('usuarios')->result();
    }

    public function listar_permissoes_usuario($usuario) {
        $this->db->select('permissoes.usuario, classes_metodos.*');
        $this->db->from('classes_metodos');
        $this->db->join('permissoes', 'permissoes.metodo = classes_metodos.id AND permissoes.usuario = ' . $usuario, 'LEFT');
        $this->db->order_by('classes_metodos.classe, classes_metodos.metodo');
        return $this->db->get()->result();
    }

    public function efetuar_login($login, $senha) {
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        return $this->db->get('usuarios')->result();
    }
    public function exibir($id){
        $this->db->where('id', $id);
        return $this->db->get('usuarios')->result();
    }
    public function alterar_usuario($id, $login, $senha){
        $dados['id'] = $id;
        $dados['login'] = $login;
        $dados['senha'] = $senha;
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $dados);
    }
    public function excluir($id){
        $dados['id'] = $id;
        $this->db->where('id', $id);
        $this->db->delete('usuarios', $dados);
    }
    public function verifia_metodo_existe($classe, $metodo) {
        $this->db->where('classe', $classe);
        $this->db->where('metodo', $metodo);
        if ($this->db->count_all_results('classes_metodos') < 1) {
            $dados['classe'] = $classe;
            $dados['metodo'] = $metodo;
            $dados['nome_amigavel'] = $metodo . " - " . $classe;
            $this->db->insert('classes_metodos', $dados);
        }
    }

    public function validar($classe, $metodo) {
        $this->verifia_metodo_existe($classe, $metodo);
        $ignorar = array('efetuar_login', 'login', 'sem_permissao', 'logout');
        if (!$this->session->login && !in_array($metodo, $ignorar)) {
            $this->db->select('classes_metodos.id as id_metodo,');
            $this->db->from('classes_metodos');
            $this->db->join('permissoes', 'permissoes.metodo = classes_metodos.id');
            $this->db->where('classes_metodos.classe', $classe);
            $this->db->where('classes_metodos.metodo', $metodo);
            $this->db->where('permissoes.usuario', $this->session->id_usuario);
            $permissao = $this->db->get()->result();
            if (count($permissao) != 1) {
                redirect(base_url("administracao/login"));
            }
        }
    }

    public function alterar_permissoes_usuario($usuario, $metodo) {
        $this->db->trans_start();
        $this->db->where('usuario', $usuario);
        $this->db->delete('permissoes');
        foreach ($metodo as $permitir) {
            $dados['usuario'] = $usuario;
            $dados['metodo'] = $permitir;
            $this->db->insert('permissoes', $dados);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
    public function temPermissao($nome){
        $this->load->model('permissoes_model', 'modelpermissoes');
        $this->modelpermissoes->temPermissao($nome);
    }
}
