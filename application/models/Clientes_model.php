<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function listar($filtro = null) {
        $this->db->select("(SELECT count(*) FROM pedidos WHERE cliente = (clientes.id)) as numero_pedidos, clientes.*");
        $this->db->from('clientes');
        $this->db->join('pedidos', 'pedidos.cliente = clientes.id', 'left');
        if ($filtro) {
            if ($filtro == 'novos') {
                $this->db->where('clientes.status', 0);
            } else if ($filtro == 'pedidos.abertos') {
                $this->db->where('pedidos.status', 0);
            }
        }
        $this->db->group_by('clientes.id');
        return $this->db->get()->result();
    }
    public function detalhes_cliente($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->get('clientes')->result();
    }
    public function excluir($id){
        $this->db->where('md5(id)', $id);
        $this->db->delete('clientes');
    }
}
