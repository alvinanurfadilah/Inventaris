<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmin extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('pages/Header', $data);
		$this->load->view('pages/Sidebar');
		$this->load->view('Dashboard');
		$this->load->view('pages/Footer');
	}
}