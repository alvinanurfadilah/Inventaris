<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {

	// private $main = 'Main';
	// private $section = [];

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->section['header'] = 'pages/header';
	// 	$this->section['sidebar'] = 'pages/sidebar';
	// 	$this->section['footer'] = 'pages/footer';
	// 	$this->section['uri'] = $this->uri->segment(1);
	// 	$this->section['data_sidebar'] = $this->menu->getMenus();

	// 	$this->load->model('NotifActionModel','notif');

	// }

	public function index()
	{
		//$this->section['content'] = 'Dashboard';

		// $data = [
		// 	'section' => $this->section
		// 	// 'notifs' => $this->notif->show()->result_array()
		// ];
		// $this->load->view($this->main, $data, FALSE);

       
        $this->load->view('pages/Header');
        $this->load->view('pages/Sidebar');
        $this->load->view('Dashboard');
        $this->load->view('pages/Footer');
	}

}