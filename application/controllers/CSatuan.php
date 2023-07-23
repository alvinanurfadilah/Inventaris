<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CSatuan extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('MSatuan');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['data'] = $this->MSatuan->show();
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/Satuan', $data);
                $this->load->view('pages/Footer');
        }
}
