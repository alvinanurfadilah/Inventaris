<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CSatuan extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('MSatuan');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['data'] = $this->MSatuan->show();
                $this->load->view('pages/Header');
                $this->load->view('pages/Sidebar');
                $this->load->view('master/Satuan', $data);
                $this->load->view('pages/Footer');
        }

        public function index_post()
        {
                $data = [
                        'slug' => str_replace(' ', '-', strtolower($this->input->post('satuan'))),
                        'satuan' => $this->input->post('satuan'),
                        'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_satuan', $data);
                redirect('CSatuan/index');
        }

        function edit($slug){
                $where = array('slug' => $slug);
                $data['data'] = $this->MJenis->edit_data($where,'tbl_satuan');
                $row = ['id' => $data['id']];
                $this->load->view('master/Satuan',$row);
            }
        
            function update(){
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
             
                $this->MSatuan->update_data($where,$data,'tbl_satuan');
                redirect('CSatuan/index');
            }
        
            public function delete($id)
            {
                $where = ['id' => $id];
                $this->MSatuan->delete($where, 'tbl_satuan');
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
