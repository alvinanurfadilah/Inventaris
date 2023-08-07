<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CObat extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                is_logged_in();
                $this->load->model('MObat', 'obat');
                $this->load->model('MDetailObat', 'detail_obat');
                $this->load->model('MJenis', 'jenis');
                $this->load->model('MSatuan', 'satuan');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['title'] = 'Obat';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
                $data['data'] = $this->obat->show();

                // $data = $this->db->get_where('tbl_obat', ['id' => $id ])->row_array();
                // $detail = $this->detail_obat->show(['obat_id' => $data['obat_id']])->result_array();
                // $data['obat'] = $detail;
                // $data['overall_stock'] = $this->detail_obat->sumStok(['obat_id' => $data['obat_id']])->row()->stock;

                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('master/Obat', $data);
                $this->load->view('pages/Footer');
        }

        public function form()
        {
                $data = [
                        'data' => $this->obat->show(),
                        'jenis' => $this->jenis->show(),
                        'satuan' => $this->satuan->show()
                ];
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/FormObat', $data);
                $this->load->view('pages/Footer');
        }

        public function detail_obat()
        {
                $data['title'] = 'Detail Obat';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
                $data = [
                        'data' => $this->obat->show(),
                        'detail' => $this->detail_obat->show(),
                        'jenis' => $this->jenis->show(),
                        'satuan' => $this->satuan->show()
                ];
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('master/DetailObat', $data);
                $this->load->view('pages/Footer');
        }

        function detail($slug)
        {
                $where = array('slug' => $slug);
                $data = [
                        'data' => $this->obat->edit_data($where, 'tbl_obat'),
                ];
                //$row = ['id' => $data['id']];
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/DetailObat', $data);
                $this->load->view('pages/Footer');
        }

        public function form_edit()
        {
                $data = [
                        'data' => $this->obat->show(),
                        'jenis' => $this->jenis->show(),
                        'satuan' => $this->satuan->show()
                ];
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/FormEditObat', $data);
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

        function edit($slug)
        {
                $where = array('slug' => $slug);
                $data = [
                        'data' => $this->obat->edit_data($where, 'tbl_obat'),
                ];
                //$row = ['id' => $data['id']];
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/FormEditObat', $data);
                $this->load->view('pages/Footer');
        }

        function update()
        {
                $id = $this->input->post('id');
                $kode = $this->input->post('kode');
                $name = $this->input->post('obat');
                $jenis = $this->input->post('jenis');
                $satuan = $this->input->post('satuan');

                $data = array(
                        'slug' => str_replace(' ', '-', strtolower($this->input->post('obat'))),
                        'kode_obat' => $kode,
                        'name' => $name,
                        'jenis_id' => $jenis,
                        'satuan_id' => $satuan,
                        'updated_at' => date('Y-m-d H:i:s')
                );

                $where = array(
                        'id' => $id
                );

                $this->obat->update_data($where, $data, 'tbl_obat');
                redirect('CObat/index');
        }

        public function index_delete($slug)
        {
                if (@$slug) {
                        $idslug = ['slug' => $slug];
                        $get = $this->obat->show($idslug);

                        if ($get->num_rows() == 1) {
                                $data = $get->row_array();
                                $id = ['id' => $data['id']];
                                $this->obat->delete($id, 'tbl_obat');
                        }
                        redirect('CObat/index');
                }
        }
}
