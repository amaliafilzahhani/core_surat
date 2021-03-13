<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->m_auth->check_login();
		$this->load->model('m_dashboard');
	}

	function index()
	{
		$this->l_skin->main('home/dashboard');
	}

}