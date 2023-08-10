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

                $obat_proses = [
                        'tanggal' => $this->input->post('tanggal'),
                        'user_id' => $this->input->post('user_id'),
                        'kategori_id' => 1,
                        //'detail_pasien_id' => $this->input->post('detail_pasien_is'),
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

                $obat_proses = [
                        'tanggal' => $tanggal,
                        'user_id' => $user_id,
                        'updated_at' => date('Y-m-d H:i:s')
                ];

                $detail_obat_proses = [
                        'updated_at' => date('Y-m-d H:i:s')
                ];

                $where = [
                        'id' => $id
                ];

                $this->detail_obat->update_data($where, $detail_obat, 'tbl_detail_obat');
                $this->obat_proses->update_data($where, $obat_proses, 'tbl_obat_proses');
                $this->detail_obat_proses->update_data($where, $detail_obat_proses, 'tbl_detail_obat_proses');
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
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/ObatKeluar', $data);
                $this->load->view('pages/Footer');
        }

        public function form()
        {
                $data['title'] = 'Form Obat Keluar';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();


                $data['data'] = $this->detail_obat_proses->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('transaksi/FormObatKeluar', $data);
                $this->load->view('pages/Footer');
        }
}
