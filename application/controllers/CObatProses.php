<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CObatProses extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                is_logged_in();
                $this->load->model('MObatProses', 'obat_proses');
                $this->load->model('MDetailObatProses', 'detail_obat_proses');
                $this->load->model('MPasien', 'pasien');
                $this->load->model('MDetailPasien', 'detail_pasien');
                $this->load->helper('url');
        }

        public function masuk()
        {
                $data['title'] = 'Obat Masuk';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['data'] = $this->detail_obat_proses->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/ObatMasuk', $data);
                $this->load->view('pages/Footer');
        }

        public function keluar()
        {
                $data['title'] = 'Obat Keluar';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['data'] = $this->detail_obat_proses->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/ObatKeluar', $data);
                $this->load->view('pages/Footer');
        }

        // public function post()
        // {
        //         $data = [
        //                 'kategori_id' => $this->input->post('kategori_id'),
        //                 'tanggal' => $this->input->post('tanggal'),
        //                 'user_id' => $this->input->post('user_id'),
        //                 'kode_obat' => $this->input->post('kode_obat'),
        //                 'expired' => $this->input->post('expired'),
        //                 'stock' => $this->input->post('stock')

        //         ];
        //         if (@$this->input->post('kategori') == 2) {
        //                 $data = [
        //                         'pasien_id' => $this->input->post('pasien_id'),
        //                         'tanggal_berobat' => $this->input->post('tanggal_berobat'),
        //                         'ket' => $this->input->post('ket')
        //                 ];
        //         };
        // }

        public function masuk_post()
        {
                $data = [
                        'detail_obat_id' => $this->input->post('detail_obat_id'),
                        'obat_id' => $this->input->post('obat_id'),
                        'stock' => $this->input->post('stock'),
                        'expired' => $this->input->post('expired'),
                        'obat_proses_id' => $this->input->post('obat_proses_id'),
                        'tanggal' => $this->input->post('tanggal'),
                        'user_id' => $this->input->post('user_id'),
                        'kategori_id' => $this->input->post('kategori_id'),
                        'detail_pasien_id' => $this->input->post('detail_pasien_is'),
                        'created_at' => date('Y-m-d H:i:s')
                ];
        }
}
