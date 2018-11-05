<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transportadoras_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function tabela_fretes(){
        $this->db->select("contact('<a href=./transportadoras/excluir/', id,'>',id,'</a>') as Excluir");
        $this->db->select("peso_de as 'De Kg', peso_ate as 'Ate Kg', preco as R$, asicional_kg as 'R$ por Kg Adicional', uf as Estado");
        return $this->db->get('tb_transporte_preco');
    }
}