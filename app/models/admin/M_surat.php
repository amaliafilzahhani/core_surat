<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_surat extends CI_Model {
    
	public function __construct(){
            parent::__construct();
    }

    var $table          = 'tbl_surat';
    var $column_order   = array(
        null,
        'srt_kode',
        'srt_name',
        'srt_tgl',
        'srt_jenis',
        'srt_desk'
    );

    var $column_search  = array( 
        'srt_kode',
        'srt_name',
        'srt_tgl',
        'srt_jenis',
        'srt_desk'
    );

    var $order          = array('id_surat' => 'desc');

    private function get_datatables_query()
    {
        $i              = 0;
        $search         = @$_POST['search']['value'];
        $order          = @$_POST['order'];

        $this->db->from($this->table);  

        foreach($this->column_search as $item)
        {
            if($search)
            {
                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $search);
                }
                else
                {
                    $this->db->or_like($item, $search);
                }

                if(count($this->column_search) - 1 == $i)
                $this->db->group_end();
            } $i++;
        }

        if(isset($order))
        {
            $this->db->order_by($this->column_order[$order['0']['column']], $order['0']['dir']);
        }

        elseif(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
       $this->get_datatables_query();
       if($_POST['length'] != -1)
       $this->db->limit($_POST['length'], $_POST['start']);
       $query = $this->db->get();
       return $query->result();
    }

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    } 

    function expired($date){
        
        $awal  = date_create($date);
        $akhir = date_create();
        $diff  = date_diff( $awal, $akhir );

        // echo $diff->y . ' tahun, ';
        // echo $diff->m . ' bulan, ';
        return $diff->d; //hari
        // echo $diff->h . ' jam, ';
        // echo $diff->i . ' menit, ';
    }

    public function generate_code()
    {
        $kode = 1;
        $monthYear  = date("ym");

        $month = date("m-y");
        $query = $this->db->query("
                    SELECT RIGHT(srt_kode, 4)  AS kode
                    FROM tbl_surat
                    WHERE date_format(srt_insert_date, '%m-%y') = '$month' 
                    GROUP BY kode
                    ORDER BY id_surat DESC
                    LIMIT 1
                ");
        $data = $query->row();
        if($data){
            $kode = $data->kode + 1;
        }
        return $monthYear.str_pad($kode,4,"0",STR_PAD_LEFT); 
    }

    public function insert_data_surat($data){
        $this->db->insert('tbl_surat', $data);
        $this->db->insert_id();
    }

    public function get_data_surat($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_surat'); 
        //$this->db->order_by('id_surat','DESC');
        $this->db->where('id_surat',$id);
        return $this->db->get()->row();
    } 

    public function update_data_surat($data,$id)
    {
        $this->db->where('id_surat', $id);
        return $this->db->update('tbl_surat', $data);
    } 

    public function delete_data_surat($id){
        $this->db->where('id_surat', $id);
		$this->db->delete('tbl_surat');
    }
}