<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function __construct(){
            parent::__construct();
	}

	function get_session($id)
	{
		$data = array(
			'log' => $this->session->userdata('sess_log'),
			'id' => $this->session->userdata('sess_id'),
			'name' => $this->session->userdata('sess_name'),
            'level' => $this->session->userdata('sess_level'),
			'avatar' => $this->session->userdata('sess_avatar')
		);
		return $data[$id];
	}

    function avatar()
    {
        if(empty($this->session->userdata('sess_avatar'))){
            return base_url('img/noimage.png');
        }else{
            return base_url($this->session->userdata('sess_avatar'));
        }
    }

    // HAK AKSES CONTROLLERS
	function check_login(){
		if(empty($this->session->userdata('sess_log'))){redirect(base_url());}
	}

    function check_superadmin(){
        if($this->session->userdata('sess_level') != 1 AND $this->session->userdata('sess_level') != 2){redirect(base_url());}
    }

	// HAK AKSES MENU
    function check_akses()
    {
		if($this->get_session('log') == TRUE){
			$uri = $this->uri->segment(1).'/'.$this->uri->segment(2);
			$LevelUser = $this->session->userdata('sess_level');
			$query_menu = $this->db->query('SELECT id_menu FROM conf_menu WHERE status=1 AND sub=1 AND link="'.$uri.'" AND level LIKE "%'.$LevelUser.'%" LIMIT 1');
			$query_sub = $this->db->query('SELECT id_submenu FROM conf_submenu WHERE status=1 AND link="'.$uri.'" AND level LIKE "%'.$LevelUser.'%" LIMIT 1');
			if($query_menu->num_rows() < 1) {
				if($query_sub->num_rows() < 1) {
					redirect(base_url());
				}
			}
		}else{
			redirect(base_url());
		}
	}

	// TOKEN CSRF
    function gen_token()
    {
    	$token = $this->l_help->rand_str1(5, FALSE);
    	$this->session->set_tempdata('datatoken', $token, 3600);
    	return '<input type="hidden" name="datatoken" value="'.base64_encode($token).'">';
    }

    function check_token($token)
    {
    	$data_token = base64_decode($token);
    	$sess_token = $this->session->tempdata('datatoken');
    	if($data_token === $sess_token){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    	$this->session->unset_tempdata('datatoken');
    }

    function menu_sidebar()
    {
        $LevelUser = $this->session->userdata('sess_level');
        $query_menu = $this->db->query('SELECT * FROM conf_menu WHERE akses=1 AND status=1 AND level LIKE "%'.$LevelUser.'%" ORDER BY position ASC');
        $query_sub = $this->db->query('SELECT * FROM conf_submenu WHERE status=1 AND level LIKE "%'.$LevelUser.'%" ORDER BY position ASC');
        if ($query_menu->num_rows() > 0)
        {
            foreach ($query_menu->result() as $menu)
            {
                $twolink = $this->uri->segment(1).'/'.$this->uri->segment(2);
                if($menu->link == $this->uri->segment(1)){
                    $active = 'active';
                }
                elseif($menu->link == $twolink){
                    $active = 'active';
                }
                else{
                    $active = '';
                }

                if($menu->sub == 2){
                    echo '<li class="sidenav-item '.$active.'"><a class="sidenav-link sidenav-toggle" href="javascript:void(0)" data-sidenav-dropdown-toggle><span class="sidenav-link-icon"><i class="sidenav-icon fa '.$menu->icon.'"></i></span><span class="sidenav-link-title">&nbsp;&nbsp;'.$menu->name.'</span></></a>'."\n";
                    echo '<ul class="sidenav-menu">';
                    foreach ($query_sub->result() as $sub)
                    {
                         $twolink = $this->uri->segment(1).'/'.$this->uri->segment(2);
                         if($sub->link == $twolink){
                            $actibe_sub = 'active';
                         }
                         else{
                            $actibe_sub = '';
                         }
                        
                         if($menu->id_menu == $sub->id_menu)
                        {
                            echo '<li class="sidenav-item '.$actibe_sub.'"><a class="sidenav-link" href="'.site_url().$sub->link.'"><i class="fa '.$sub->icon.'"></i>&nbsp;&nbsp;'.$sub->name.'</a></li>'."\n";
                        }
                    }
                    echo '</ul></li>';
                }else{
                    echo '<li class="sidenav-item '.$active.'"><a class="sidenav-link '.$active.'" href="'.site_url().$menu->link.'"><span class="sidenav-link-icon"><i class="sidenav-icon fa '.$menu->icon.'"></i></span><span class="sidenav-link-title">&nbsp;&nbsp;'.$menu->name.'</span></a></li>';
                }
            }
        }
        else{ return NULL; }
    }

}