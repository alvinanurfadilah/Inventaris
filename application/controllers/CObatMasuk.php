<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CObatMasuk extends CI_Controller {

	public function index()
	{
        $this->load->view('pages/Header');
        $this->load->view('pages/Sidebar');
        $this->load->view('transaksi/ObatMasuk');
        $this->load->view('pages/Footer');
	}
}