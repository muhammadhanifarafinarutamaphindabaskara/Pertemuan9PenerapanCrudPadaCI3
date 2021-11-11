<?php

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->auth->cek_login();
	}

	public function index()
	{
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar');
		$this->load->view('administrator/dashboard');
		$this->load->view('template_administrator/footer');
	}
}
