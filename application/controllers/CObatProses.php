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
                $this->load->model('MObat', 'obat');
                $this->load->model('MDetailObat', 'detail_obat');
                $this->load->model('MPasien', 'pasien');
                $this->load->model('MDetailPasien', 'detail_pasien');
                $this->load->model('MTampung', 'tampung');
                $this->load->helper('url');
        }

        public function masuk()
        {
                $data['title'] = 'Obat Masuk';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
                $data['id'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['data'] = $this->detail_obat_proses->show();
                $data['obat'] = $this->obat->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/ObatMasuk', $data);
                $this->load->view('pages/Footer');
        }

        public function masuk_post()
        {
                $detail_obat = [
                        'obat_id' => $this->input->post('obat_id'),
                        'stock' => $this->input->post('stock'),
                        'expired' => $this->input->post('expired'),
                        'created_at' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('tbl_detail_obat', $detail_obat);
                //untuk mengambil id paling terakhir
                $last_idDetail = $this->db->insert_id();
                $direct = $this->db->get_where('tbl_detail_obat', ['obat_id' => $detail_obat['obat_id']]);
                foreach ($direct->result_array() as $row) {
                        $period_array[] = intval($row['stock']);
                }
                $total = array_sum($period_array);
                $this->db->set('overall_stock', $total);
                $this->db->where('id', $detail_obat['obat_id']);
                $this->db->update('tbl_obat');

                $obat_proses = [
                        'tanggal' => $this->input->post('tanggal'),
                        'user_id' => $this->input->post('user_id'),
                        'kategori_id' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_obat_proses', $obat_proses);
                $last_idProses = $this->db->insert_id();

                $detail_obat_proses = [
                        'detail_obat_id' => $last_idDetail,
                        'obat_proses_id' => $last_idProses,
                        'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_detail_obat_proses', $detail_obat_proses);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Obat Masuk added successfully! </div>');
                redirect('CObatProses/masuk');
        }

        public function masuk_edit($id)
        {
                $where = array('id' => $id);
                $data['data'] = $this->detail_obat_proses->edit_data($where, 'tbl_detail_obat_proses');
                $row = ['id' => $data['id']];
                $this->load->view('CObatProses/masuk', $row);
        }

        function masuk_update()
        {
                $id = $this->input->post('id');
                $detail_obat_id = $this->input->post('detail_obat_id');
                $obat_proses_id = $this->input->post('obat_proses_id');
                $obat_id = $this->input->post('obat_id');
                $stock = $this->input->post('stock');
                $expired = $this->input->post('expired');
                $tanggal = $this->input->post('tanggal');
                $user_id = $this->input->post('user_id');

                $detail_obat = [
                        'obat_id' => $obat_id,
                        'stock' => $stock,
                        'expired' => $expired,
                        'updated_at' => date('Y-m-d H:i:s')
                ];

                $where = [
                        'id' => $detail_obat_id
                ];

                $this->detail_obat->update_data($where, $detail_obat, 'tbl_detail_obat');

                $direct = $this->db->get_where('tbl_detail_obat', ['obat_id' => $detail_obat['obat_id']]);
                foreach ($direct->result_array() as $row) {
                        $period_array[] = intval($row['stock']);
                }
                $total = array_sum($period_array);
                $this->db->set('overall_stock', $total);
                $this->db->where('id', $detail_obat['obat_id']);
                $this->db->update('tbl_obat');

                $obat_proses = [
                        'tanggal' => $tanggal,
                        'user_id' => $user_id,
                        'updated_at' => date('Y-m-d H:i:s')
                ];

                $where = [
                        'id' => $obat_proses_id
                ];

                $this->obat_proses->update_data($where, $obat_proses, 'tbl_obat_proses');

                $detail_obat_proses = [
                        'updated_at' => date('Y-m-d H:i:s')
                ];

                $where = [
                        'id' => $id
                ];

                $this->detail_obat_proses->update_data($where, $detail_obat_proses, 'tbl_detail_obat_proses');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Obat Masuk updated successfully! </div>');
                redirect('CObatProses/masuk');
        }

        public function masuk_delete($id)
        {
                if (@$id) {
                        $idslug = ['id' => $id];
                        $get = $this->detail_obat_proses->show($idslug);

                        if ($get->num_rows() == 1) {
                                $data = $get->row_array();
                                $id = ['id' => $data['id']];


                                // $detail_obat_id = ['id' => $data['detail_obat_id']];
                                // $get = $this->detail_obat->show($detail_obat_id)->row_array();


                                // $direct = $this->db->get_where('tbl_detail_obat', ['obat_id' => $get['obat_id']]);
                                // var_dump($direct);
                                // die;
                                // foreach ($direct->result_array() as $row) {
                                //         $period_array[] = intval($row['stock']);
                                // }
                                // $total = array_sum($period_array);
                                // $this->db->set('overall_stock', $total);
                                // $this->db->where('id', $detail_obat['obat_id']);
                                // $this->db->update('tbl_obat');


                                $this->detail_obat_proses->delete($id);

                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Obat Masuk deleted successfully! </div>');
                        }
                        redirect('CObatProses/masuk');
                }
        }

        public function keluar()
        {
                $data['title'] = 'Obat Keluar';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();


                $data['data'] = $this->detail_obat_proses->show();
                $data['detail_pasien'] = $this->detail_pasien->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/ObatKeluar', $data);
                $this->load->view('pages/Footer');
        }

        public function form()
        {
                $data['title'] = 'Form Obat Keluar';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['id'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
                $data['data'] = $this->detail_obat_proses->show();
                $data['pasien'] = $this->pasien->show();
                $data['obat'] = $this->obat->show();
                $data['detail_obat'] = $this->detail_obat->show();
                $data['detail'] = $this->detail_obat->getObat();
                $data['tampung'] = $this->tampung->getObat();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/FormObatKeluar', $data);
                $this->load->view('pages/Footer');
        }

        public function tampung()
        {
                $tampung = [
                        'obat_id' => $this->input->post('obat_id'),
                        'jml_obat' => $this->input->post('jml_obat')
                ];
                $this->db->insert('tbl_tampung', $tampung);
                redirect('CObatProses/form');
        }

        public function keluar_post()
        {
                $obat_proses = [
                        'tanggal' => $this->input->post('tanggal'),
                        'user_id' => $this->input->post('user_id'),
                        'kategori_id' => 2,
                        'detail_pasien_id' => $this->input->post('detail_pasien_id'),
                        'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_obat_proses', $obat_proses);
                $last_idProses = $this->db->insert_id();

                $tampung = $this->db->get('tbl_tampung')->result_array();
                foreach ($tampung as $t) {
                        $this->db->set('jml_obat', $t['jml_obat']);
                        $this->db->set('obat_proses_id', $last_idProses);
                        $this->db->set('created_at', date('Y-m-d H:i:s'));

                        $get = $this->detail_obat->getStock($t['obat_id'])->row_array();
                        $this->db->set('detail_obat_id', $get['id']);

                        $this->db->insert('tbl_detail_obat_proses');

                        // untuk mengurangi stok obat
                        $detail = $this->detail_obat->getStock($t['obat_id'])->result_array();
                        $jml = $t['jml_obat'];
                        $sisa = $jml;
                        foreach ($detail as $d) {
                                $sisa = $sisa - $d['stock'];

                                if ($jml >= $d['stock']) {
                                        $this->db->set('stock', 0);
                                        $this->db->where('id', $d['id']);
                                        $this->db->update('tbl_detail_obat');
                                } else {
                                        $this->db->set('stock', abs($sisa), false);
                                        $this->db->where('id', $d['id']);
                                        $this->db->update('tbl_detail_obat');
                                }
                        }

                        $direct = $this->db->get_where('tbl_detail_obat', ['id' => $get['id']]);
                        foreach ($direct->result_array() as $row) {
                                $period_array[] = intval($row['stock']);
                        }
                        $total = array_sum($period_array);
                        $this->db->set('overall_stock', $total);
                        $this->db->where('id', $get['obat_id']);
                        $this->db->update('tbl_obat');
                }
                $this->db->truncate('tbl_tampung');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Obat Keluar added successfully! </div>');
                redirect('CObatProses/keluar');
        }

        public function keluar_delete($id)
        {
                if (@$id) {
                        $idslug = ['id' => $id];
                        $get = $this->detail_obat_proses->show($idslug);

                        if ($get->num_rows() == 1) {
                                $data = $get->row_array();
                                $id = ['id' => $data['id']];
                                $this->detail_obat_proses->delete($id);
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Obat Keluar deleted successfully! </div>');
                        }
                        redirect('CObatProses/keluar');
                }
        }





        public function laporanMasuk()
        {
                $start_date = $this->input->get('start_date', true);
                $end_date = $this->input->get('end_date', true);
                //die($start_date . $end_date);

                $data['title'] = 'Laporan Obat Masuk';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['data'] = $this->obat_proses->getMasuk();

                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('laporan/laporanMasuk', $data);
                $this->load->view('pages/Footer');
        }
}
