<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public $dir_v = 'admin/surat/';
    public $dir_m = 'admin/';
    //public $dir_l = 'admin/';

	public function __construct(){
		parent::__construct();
        $this->m_auth->check_login();
        $this->load->model($this->dir_m.'m_surat');
        //$this->load->library($this->dir_l.'l_surat');
		$this->load->helper('global');  
	}

	function index()
	{
        $data['js']  = array(
            'lib/mask/jquery.mask.min.js',
			'lib/datatables/datatables.min.js',
            'lib/datatables/dataTables.bootstrap.min.js', 
            'lib/datatables/dataTables.fixedColumns.min.js',
            'lib/select/chosen.jquery.min.js',
            'lib/datepicker/datepicker.min.js',
			'src/js/admin/surat.js'
		);
		$data['css'] = array( 
            'lib/datepicker/datepicker.min.css',
            'lib/select/bootstrap-chosen.css',
            'lib/datatables/dataTables.bootstrap.min.css',
            'lib/datatables/fixedColumns.bootstrap.min.css'
		);
        $this->l_skin->main($this->dir_v.'v_list', $data);
    }

    function get_data_surat()
    { 
        $list = $this->m_surat->get_datatables();
        $no   = $this->input->post('start');
        $data = array();
        
        foreach($list as $d)
        {  
            $no++;

            $button ="
            <a id='edit_btn' class='text-primary mr-1'  data-id=".$d->id_surat."><i class='fa fa-edit'></i></a> 
            <a id='delete_data' class='text-danger mr-1'  data-id=".$d->id_surat."><i class='fa fa-trash'></i></a>
            ";

            $row    = array();
            $row[]  = $no; 
            $row[]  = $d->srt_kode; 
            $row[]  = $d->srt_name; 
            $row[]  = $d->srt_tgl; 
            $row[]  = $d->srt_jenis; 
			$row[]  = $d->srt_desk; 
            $row[]  = $button;  
            $data[] = $row;
        }
        
        $output = array(
            "draw"              => $this->input->post('draw'),
            "recordsTotal"      => $this->m_surat->count_all(),
            "recordsFiltered"   => $this->m_surat->count_filtered(),
            "data"              => $data,
        );

        // var_dump($output);
        // exit();

        echo json_encode($output);
        exit();
	}

	function add()
	{
        $data['js']  = array(
            'lib/mask/jquery.mask.min.js',
			'lib/datatables/datatables.min.js',
            'lib/datatables/dataTables.bootstrap.min.js', 
            'lib/datatables/dataTables.fixedColumns.min.js',
            'lib/select/chosen.jquery.min.js',
            'lib/datepicker/datepicker.min.js',
			'src/js/admin/surat.js'
		);
		$data['css'] = array( 
            'lib/datepicker/datepicker.min.css',
            'lib/select/bootstrap-chosen.css',
            'lib/datatables/dataTables.bootstrap.min.css',
            'lib/datatables/fixedColumns.bootstrap.min.css'
		);
        $this->l_skin->main($this->dir_v.'v_add_surat', $data);
	}

    function act_add_surat()
	{
		$this->form_validation->set_rules('srt_kode', 'Kode Surat', 'trim|required|is_unique[tbl_surat.srt_kode]');
		
		if ($this->form_validation->run() == FALSE){
			$notif['notif'] = validation_errors();
			$notif['status'] = 1;
			echo json_encode($notif);
		}else{

			$data = array(
				'srt_kode' => $this->input->post('srt_kode'),
				'srt_name' => $this->input->post('srt_name'),
				'srt_tgl' => $this->input->post('srt_tgl'),
				'srt_jenis' => $this->input->post('srt_jenis'),
				'srt_desk' => $this->input->post('srt_desk'),
				'srt_insert_date' => date('Y-m-d H:i:s')
			);

			$this->m_surat->insert_data_surat($data);
			
			$notif['notif'] = 'Data Surat '.$this->input->post('srt_kode').' berhasil di simpan !';
			$notif['status'] = 2;
			echo json_encode($notif);
		}
    }

    function edit()
	{
        $data_id = $this->input->get('id_surat');
        $data['tampil']= $this->m_surat->get_data_surat($data_id);

        $data['js']  = array(
            'lib/mask/jquery.mask.min.js',
			'lib/datatables/datatables.min.js',
            'lib/datatables/dataTables.bootstrap.min.js', 
            'lib/datatables/dataTables.fixedColumns.min.js',
            'lib/select/chosen.jquery.min.js',
            'lib/datepicker/datepicker.min.js',
			'src/js/admin/surat.js'
		);
		$data['css'] = array( 
            'lib/datepicker/datepicker.min.css',
            'lib/select/bootstrap-chosen.css',
            'lib/datatables/dataTables.bootstrap.min.css',
            'lib/datatables/fixedColumns.bootstrap.min.css'
        );
        
        $this->l_skin->main($this->dir_v.'v_edit_surat', $data);
    }

    function act_edit_surat()
	{
		$id_surat = $this->input->post('id_surat');
		$srt_kode_old = $this->input->post('srt_kode_old');
        $srt_kode = $this->input->post('srt_kode');
        
        if($srt_kode == $srt_kode_old)
		{
			$data = array(
                'srt_kode' => $this->input->post('srt_kode'),
				'srt_name' => $this->input->post('srt_name'),
				'srt_tgl' => $this->input->post('srt_tgl'),
				'srt_jenis' => $this->input->post('srt_jenis'),
				'srt_desk' => $this->input->post('srt_desk'),
            ); 

			$this->m_surat->update_data_surat($data, $id_surat);

            $notif['notif'] = 'Data Surat'.$this->input->post('srt_kode').' berhasil di ubah !';
            $notif['status'] = 2;
            echo json_encode($notif);

        }else{

            $this->form_validation->set_rules('srt_kode', 'Kode Surat', 'trim|required|[tbl_surat.srt_kode]');
            if ($this->form_validation->run() == FALSE){
                $notif['notif'] = validation_errors();
                $notif['status'] = 1;
                echo json_encode($notif);
            }else{
                $data = array(
                    'srt_kode' => $this->input->post('srt_kode'),
					'srt_name' => $this->input->post('srt_name'),
					'srt_tgl' => $this->input->post('srt_tgl'),
					'srt_jenis' => $this->input->post('srt_jenis'),
					'srt_desk' => $this->input->post('srt_desk'),
                );

                $this->m_surat->update_data_surat($data,$id);

                $notif['notif'] = 'Data Surat'.$this->input->post('srt_kode').' berhasil di ubah !';
                $notif['status'] = 2;
                echo json_encode($notif);
            }
        }
    }

    function act_del()
	{
		$id = $this->input->post('id_surat');
        $this->m_surat->delete_data_surat($id);
        $notif['notif']  = 'Data Surat'.$this->input->post('srt_name').' berhasil di hapus !';
        $notif['status'] = 2;
        echo json_encode($notif);
    }

}