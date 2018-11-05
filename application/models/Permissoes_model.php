<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permissoes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function temPermissao($nome) {
        $this->db->select('nome');
        $this->db->from('permissoes_parametros');
        $this->db->where('nome', $nome);
        return $this->db->get()->result();
    }

}
