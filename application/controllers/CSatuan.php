<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CSatuan extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                is_logged_in();
                $this->load->model('MSatuan', 'satuan');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['title'] = 'Satuan';
                $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
                $data['data'] = $this->satuan->show();
                $this->load->view('pages/Header', $data);
                $this->load->view('pages/Sidebar', $data);
                $this->load->view('master/Satuan', $data);
                $this->load->view('pages/Footer');
        }

        public function index_post()
        {
                $this->form_validation->set_rules('satuan', 'Satuan', 'required');
                if ($this->form_validation->run() == false) {
                        redirect('CSatuan');
                } else {
                        $data = [
                                'slug' => str_replace(' ', '-', strtolower($this->input->post('satuan'))),
                                'satuan' => $this->input->post('satuan'),
                                'created_at' => date('Y-m-d H:i:s')
                        ];
                        $this->db->insert('tbl_satuan', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New satuan obat added! </div>');
                        redirect('CSatuan/index');
                }
        }

        function edit($slug)
        {
                $where = array('slug' => $slug);
                $data['data'] = $this->MJenis->edit_data($where, 'tbl_satuan');
                $row = ['id' => $data['id']];
                $this->load->view('master/Satuan', $row);
        }

        function update()
        {
                $id = $this->input->post('id');
                $satuan = $this->input->post('satuan');

                $data = array(
                        'slug' => str_replace(' ', '-', strtolower($this->input->post('satuan'))),
                        'satuan' => $satuan,
                        'updated_at' => date('Y-m-d H:i:s')
                );

                $where = array(
                        'id' => $id
                );

                $this->satuan->update_data($where, $data, 'tbl_satuan');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Satuan updated successfully! </div>');
                redirect('CSatuan/index');
        }

        public function delete($id)
        {
                $where = ['id' => $id];
                $this->satuan->delete($where, 'tbl_satuan');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Satuan deleted successfully! </div>');
                redirect('CSatuan/index');
        }

        // public function index_put($slug='')
        // {
        //         $idslug = ['slug' =>$slug];
        //         $data = $this->MJenis->show($idslug);
        //         $id = ['id' => $data['id']];
        //         $this->load->view('master/Satuan', $id);

        //         $arr = [
        //                 'slug' => str_replace(' ', '-', strtolower($this->input->post('jenis'))),
        //                 'jenis' => $this->input->post('jenis'),
        //                 'updated_at' => date('Y-m-d H:i:s')
        //         ];

        //         $where = [
        //                 'id' => $this->input->post('id')
        //         ];

        //         $this->MJenis->update($where, $arr, 'tbl_jenis');
        //         redirect('CSatuan/index');
        // }
}
