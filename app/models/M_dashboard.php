<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_dashboard extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function total_inout($kode){
        $date = date('Y-m-d');
        $this->db->select('count(id_check_log) as jumlah');
        $this->db->from('sft_check_log');
        $this->db->where('DATE(cl_insert_date)',$date); 
        $this->db->where('cl_inout',$kode); 
        $get_data = $this->db->get();
        $data = $get_data->row();
        return $data->jumlah;
    }
}