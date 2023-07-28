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

        public function index_post()
        {
                $data = [
                        'slug' => str_replace(' ', '-', strtolower($this->input->post('satuan'))),
                        'kode_obat' => $this->input->post('kode_obat'),
                        'name' => $this->input->post('name'),
                        'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_obat', $data);
                redirect('CObat/index');
        }
}
