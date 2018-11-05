<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function pegaDados() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('senha', $this->input->post('senha'));
        $query = $this->db->get('clientes')->result();

        $dadosParaSessao = array(
            'id' => $query[0]->id,
            'nome' => $query[0]->nome,
            'sobrenome' => $query[0]->sobrenome,
            'logado' => true
        );

        $this->session->set_userdata($dadosParaSessao);
        return $dadosParaSessao;
    }

    function recuperaDados() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('cpf', $this->input->post('cpf'));
        $query = $this->db->get('clientes')->result();

        return $query;
    }

# VALIDA USUÁRIO

    public function autenticar($user, $password) {
        $this->db->where('email', $user);
        $this->db->where('senha', $password);

        $query = $this->db->get('clientes')->row_array();
        return $query;
    }

# VERIFICA SE O USUÁRIO ESTÁ LOGADO

    public function logged() {
        $logged = $this->session->userdata('logged');
        if (!isset($logged) || $logged != true) {
            echo 'Você não tem permissão para acessar essa página!!';
            die;
        }
    }

}
