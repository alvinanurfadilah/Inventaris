<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CJenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MJenis', 'jenis');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->MJenis->show();
        $this->load->view('pages/Header', $data);
        $this->load->view('pages/Sidebar', $data);
        $this->load->view('master/Jenis', $data);
        $this->load->view('pages/Footer');
    }

    public function index_post()
    {
        $data = [
            'slug' => str_replace(' ', '-', strtolower($this->input->post('jenis_obat'))),
            'jenis' => $this->input->post('jenis_obat'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_jenis', $data);
        redirect('CJenis/index');
    }

    function edit($id)
    {
        $where = array('id' => $id);
        $data['data'] = $this->jenis->edit_data($where, 'tbl_jenis');
        $row = ['id' => $data['id']];
        $this->load->view('master/Jenis', $row);
    }

    function update()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis_obat');

        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('jenis_obat'))),
            'jenis' => $jenis,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $where = array(
            'id' => $id
        );

        $this->jenis->update_data($where, $data, 'tbl_jenis');
        redirect('CJenis/index');
    }



    // public function index_put($slug='')
    // {
    //     // echo $id;
    //     // die;
    //     $idslug = ['slug' => $slug];
    //     $row = $this->jenis->show($idslug)->row();
    //     $id = ['id' => $row['id']];

    //     $data = [
    //         'slug' => str_replace(' ', '-', strtolower($this->input->post('jenis_obat'))),
    //         'jenis' => $this->input->post('jenis_obat'),
    //         'updated_at' => date('Y-m-d H:i:s')
    //     ];

    //     $this->db->update($id, $data, 'tbl_jenis');
    //     redirect('CJenis/index');
    // }

    public function index_delete($slug)
    {
        if (@$slug) {
            $idslug = ['slug' => $slug];
            $get = $this->jenis->show($idslug);

            if ($get->num_rows() == 1) {
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $this->jenis->delete($id, 'tbl_jenis');
            }
            redirect('CJenis/index');
        }
    }


    // public function index_post($slug='')
    // {
    //     $jsonArray = json_decode($this->input->raw_input_stream, true);
    //     //$postReal = $this->form_validation->set_data($jsonArray);

    //     if (!$slug) {
    //         $this->form_validation->set_rules('jenis', 'Jenis Obat', 'trim|required', [
    //             'required' => '%s Required'
    //         ]);
    //     }

    //     if ($this->form_validation->run() == FALSE && !$slug) {
    //         $this->response([
    //             'status' => FALSE,
    //             'title' => 'Invalid input required',
    //             'message' => validation_errors()
    //         ]);
    //     }else {
    //         if(@$slug){
    //             if(@$slug && @$jsonArray['jenis']){
    //                 $arr['jenis_obat'] = $jsonArray['jenis'];
    //             }
    //         }else{
    //             $arr = [
    //                 'slug' => str_replace(' ', '-', strtolower($jsonArray ['jenis'])),
    //                 'jenis_obat' => $jsonArray['jenis']
    //             ];
    //         }
    //         if(!$slug){
    //             $arr['created_at'] = date('Y-m-d H:i:s');

    //             $ins = $this->jenis_obat->insert($arr, 'data');
    //             if($ins){
    //                 $this->response([
    //                     'status' => TRUE,
    //                     'title' => 'Successful Created',
    //                     'message' => 'Jenis Obat was successful created!'
    //                 ]);
    //             }else{
    //                 $this->response([
    //                     'status' => FALSE,
    //                     'title' => 'Error Created',
    //                     'message' => 'Jenis Obat was error created!'
    //                 ]);
    //             }
    //             redirect('CJenis/index');
    //         }else{
    //             $idslug = ['slug' => $slug];
    //             $row = $this->jenis->show($idslug)->row_array();
    //             $id = ['id' => $row['id']];

    //             $arr['slug'] = str_replace(' ', '-', strtolower($jsonArray ['name']));
    //             $arr['updated_at'] = date('Y-m-d H:i:s');
    //             $upd = $this->jenis->update($id, $arr);

    //             if($upd){
    //                 $this->response([
    //                     'status' => TRUE,
    //                     'title' => 'Successful Update',
    //                     'message' => 'Jenis Obat : '.$jsonArray['name'].' was successful update!'
    //                 ]);
    //             }else{
    //                 $this->response([
    //                     'status' => FALSE,
    //                     'title' => 'Error Update',
    //                     'message' => 'Jenis Obat was error update!'
    //                 ]);
    //             }
    //         }
    //     }
    // }

    // public function index_get($slug='')
    // {
    //     if(@$slug){
    //         $get = $this->jenis->show(['slug' => $slug]);
    //         $data = $get->row_array();
    //     }else{
    //         $get = $this->jenis->show();
    //         $data = $get->result_array();
    //     }
    //     if($get->num_rows() > 0){
    //         $this->response([
    //             'status' => TRUE,
    //             'title' => 'Success get Jenis Obat',
    //             'data' => $data
    //         ]);
    //     }else{
    //         $this->response([
    //             'status' => FALSE,
    //             'title' => 'Jenis Obat not found',
    //             'data' => []
    //         ]);
    //     }
    // }

    // public function index_delete($slug)
    // {
    //     if(@$slug){
    //         $idslug = ['slug' => $slug];
    //         $get = $this->jenis->show($idslug);

    //         if($get->num_rows() == 1){
    //             $data = $get->row_array();
    //             $id = ['id' => $data['id']];
    //             $del = $this->jenis->delete($id);
    //             if($del){
    //                 $this->response([
    //                     'status' => TRUE,
    //                     'title' => 'Success delete one Jenis Obat',
    //                     'message' => 'Jenis Obat : '.$data['name'].' was deleted!'
    //                 ]);
    //             }else{
    //                 $this->response([
    //                     'status' => FALSE,
    //                     'title' => "Jenis Obat can't deleted",
    //                     'message' => "Can't deleted Jenis Obat"
    //                 ]);
    //             }
    //         }else{
    //             $this->response([
    //                 'status' => FALSE,
    //                 'title' => 'Jenis Obat not found',
    //                 'message' => "ID Jenis Obat can't found!"
    //             ]);
    //         }
    //     }else{
    //         $this->response([
    //             'status' => FALSE,
    //             'title' => 'ID Jenis Obat was required',
    //             'message' => 'ID Jenis Obat must be required'
    //         ]);
    //     }
    // }
}
