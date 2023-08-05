<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CKategoriProses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MKategoriProses', 'kategori_proses');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->kategori_proses->show();
        $this->load->view($data);
    }

    public function index_post()
    {
        $data = [
            'slug' => str_replace(' ', '-', strtolower($this->input->post('kategori_proses'))),
            'name' => $this->input->post('kategori_proses'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_kategori_proses', $data);
    }

    function edit($slug){
        $where = array('slug' => $slug);
        $data['data'] = $this->kategori_proses->edit_data($where,'tbl_kategori_proses');
        $row = ['id' => $data['id']];
        $this->load->view($row);
    }

    function update(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
     
        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('kategori_proses'))),
            'name' => $name,
            'updated_at' => date('Y-m-d H:m:s')
        );
     
        $where = array(
            'id' => $id
        );
     
        $this->kategori_proses->update_data($where,$data,'tbl_kategori_proses');
    }

    public function delete($id)
    {
        $where = ['id' => $id];
        $this->kategori_proses->delete($where, 'tbl_kategori_proses');
    }
}

?>