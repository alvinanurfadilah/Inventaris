<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property MObat $obat
 * @property MDetailObat $detail_obat
 * @property MJenis $jenis
 * @property MSatuan $satuan
 * @property Session $session
 * @property db $db
 * @property input $input
 * @property form_validation $form_validation
 */

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
                $data['jenis'] = $this->jenis->show();
                $data['satuan'] = $this->satuan->show();

                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('master/Obat', $data);
                $this->load->view('pages/Footer');
        }

        public function index_post()
        {
                $this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required');
                $this->form_validation->set_rules('name', 'Nama Obat', 'required');
                $this->form_validation->set_rules('jenis_id', 'Jenis Obat', 'required');
                $this->form_validation->set_rules('satuan_id', 'Satuan Obat', 'required');

                if ($this->form_validation->run() == false) {
                        redirect('CObat/index');
                } else {
                        $data = [
                                'slug' => str_replace(' ', '-', strtolower($this->input->post('name'))),
                                'kode_obat' => $this->input->post('kode_obat'),
                                'name' => $this->input->post('name'),
                                'jenis_id' => $this->input->post('jenis_id'),
                                'satuan_id' => $this->input->post('satuan_id'),
                                'created_at' => date('Y-m-d H:i:s')
                        ];
                        if ($this->obat->isExist($data['name'])) {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Nama Obat sudah tersedia! </div>');
                        } else {
                                $this->db->insert('tbl_obat', $data);
                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New obat added! </div>');
                        }
                        redirect('CObat/index');
                }
        }

        function edit($slug)
        {
                $where = array('slug' => $slug);
                $data['data'] = $this->obat->edit_data($where, 'tbl_obat');
                $row = ['id' => $data['id']];
                $this->load->view('master/Obat', $row);
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Obat updated successfully! </div>');
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
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Obat deleted successfully! </div>');
                        }
                        redirect('CObat/index');
                }
        }

        function detail($slug)
        {
                $where = array('slug' => $slug);
                $data['title'] = 'Detail Obat';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['data'] = $this->obat->getObat($where, 'v_obat');
                $data['detail'] = $this->detail_obat->getDetail($where, 'v_detail_obat');
                $data['jenis'] = $this->jenis->show();
                $data['satuan'] = $this->satuan->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('master/DetailObat', $data);
                $this->load->view('pages/Footer');
        }
}
