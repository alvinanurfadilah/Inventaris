<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CObat extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('MObat');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['data'] = $this->MObat->show();
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/Obat', $data);
                $this->load->view('pages/Footer');
        }
}
