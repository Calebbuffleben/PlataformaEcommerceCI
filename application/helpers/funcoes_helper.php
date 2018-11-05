<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('set_msg')) {
    function set_msg($msg = NULL) {
        $ci = & get_instance();
        $ci->session->set_userdata('aviso', $msg); 
    }
}
if (!function_exists('verifica_login')) {
    function verifica_login($redirect = 'login') {
        $ci = & get_instance();
        if($ci->session->userdata('logged') != TRUE){
            echo 'Acesso restrito, faça login para continuar';
            redirect($redirect, 'refresh');
        } 
    }
}
if (!function_exists('config_upload')) {
    function config_upload($path= './uploads', $types='jpg|png', $size=512) {
        $config['upload_path'] = $path;
        $config['allowed_types'] = $types;
        $config['max_size'] = $size;
        return $config;
    }
}
if (!function_exists('limpar')) {
    function limpar($string) {
        $string = preg_replace('/[`^~\'"]/', NULL, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
        $string = strtolower($string);
        $string = str_replace(" ", "-", $string);
        $string = str_replace("---", "-", $string);
        return $string;
    }
}
if(!function_exists('reais')){
    function reais($decimal){
        return "R$" .number_format($decimal, 2 , ",", ".");
    }
}
if(!function_exists('dataBr_to_dataMySQL')){
    function dataBr_to_dataMySQL($data){
        $campos = explode("/", $data);
        return date("Y-m-d", strtotime($campos[2]."/".$campos[1]."/".$campos[0]));
    }
}
if(!function_exists('dataMySQL_to_dataBr')){
    function dataMySQL_to_dataBr($data){
        return date("d/m/Y", strtotime($data));
    }
}