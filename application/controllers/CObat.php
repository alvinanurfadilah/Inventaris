<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CObat extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('MObat', 'obat');
                $this->load->model('MDetailObat', 'detail_obat');
                $this->load->model('MJenis', 'jenis');
                $this->load->model('MSatuan', 'satuan');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['data'] = $this->obat->show();
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/Obat', $data);
                $this->load->view('pages/Footer');
        }

        public function index_get($slug = '')
        {
                if (@$slug) {
                        $get = $this->obat->show(['slug' => $slug]);
                        $data = $get->row_array();
                        $detail = $this->detail_obat->show(['obat_id' => $data['obat_id']])->result_array();
                        $data['obat'] = $detail;
                        //untuk menampilkan overall_stock sesuai dengan slug yang dipanggil
                        $data['overall_stock'] = $this->detail_obat->sumStok(['obat_id' => $data['obat_id']])->row()->stock;
                } else {
                        $get = $this->obat->show();
                        $obat = $get->result_array();
                        $data = [];
                        foreach ($obat as $obt) {
                                $detail = $this->detail_obat->show(['obat_id' => $obt['obat_id']])->result_array();
                                $obt['obat'] = $detail;
                                $obt['overall_stock'] = $this->detail_obat->sumStok(['obat_id' => $obt['obat_id']])->row()->stock;
                                $data[] = $obt;
                        }
                }

                if ($data['overall_stock'] < 5) {
                        $data = $this->obat['overall_stock']->fetch_assoc();
                }
        }

        public function index_post()
        {
                $data = [
                        'slug' => str_replace(' ', '-', strtolower($this->input->post('obat'))),
                        'kode_obat' => $this->input->post('kode'),
                        'name' => $this->input->post('obat'),
                        'jenis_id' => $this->input->post('jenis'),
                        'satuan_id' => $this->input->post('satuan'),
                        'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_obat', $data);
                redirect('CObat/index');
        }
}
