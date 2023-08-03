<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CObatProses extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('MObatProses', 'obat_proses');
                $this->load->model('MDetailObatProses', 'detail_obat_proses');
                $this->load->model('MPasien', 'pasien');
                $this->load->model('MDetailPasien', 'detail_pasien');
                $this->load->helper('url');
        }

        public function masuk_index()
        {
                $data['data'] = $this->detail_obat_proses->show();
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('transaksi/ObatMasuk', $data);
                $this->load->view('pages/Footer');
        }

        public function keluar_index()
        {
                $data['data'] = $this->detail_obat_proses->show();
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('transaksi/ObatKeluar', $data);
                $this->load->view('pages/Footer');
        }

        public function form()
        {
                $data = [
                        'data' => $this->obat_proses->show(),
                        'detail_obat_proses' => $this->detail_obat_proses->show()
                ];
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('transaksi/FormObatMasuk', $data);
                $this->load->view('pages/Footer');
        }

        public function kodeObat_get($kode_obat='')
        {
                $get = $this->detail_obat_proses->search();
                $get->row();
        }

        
}
