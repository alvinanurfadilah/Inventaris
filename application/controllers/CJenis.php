<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property MJenis $jenis
 * @property Session $session
 * @property db $db
 * @property input $input
 * @property form_validation $form_validation
 */

class CJenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MJenis', 'jenis');
    }

    public function index()
    {
        $data['title'] = 'Jenis';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->jenis->show();

        $this->load->view('pages/Header', $data);
        $this->load->view('pages/Sidebar', $data);
        $this->load->view('master/Jenis', $data);
        $this->load->view('pages/Footer');
    }

    public function index_post()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');

        if ($this->form_validation->run() == false) {
            redirect('CJenis');
        } else {
            $data = [
                'slug' => str_replace(' ', '-', strtolower($this->input->post('jenis'))),
                'jenis' => $this->input->post('jenis'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('tbl_jenis', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New jenis obat added! </div>');
            redirect('CJenis/index');
        }
    }

    function edit($slug)
    {
        $where = array('slug' => $slug);
        $data['data'] = $this->jenis->edit_data($where, 'tbl_jenis');
        $row = ['id' => $data['id']];
        $this->load->view('master/Jenis', $row);
    }

    function update()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');

        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('jenis'))),
            'jenis' => $jenis,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $where = array(
            'id' => $id
        );

        $this->jenis->update_data($where, $data, 'tbl_jenis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jenis updated successfully! </div>');
        redirect('CJenis/index');
    }

    public function index_delete($slug)
    {
        if (@$slug) {
            $idslug = ['slug' => $slug];
            $get = $this->jenis->show($idslug);

            if ($get->num_rows() == 1) {
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $this->jenis->delete($id, 'tbl_jenis');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Jenis deleted successfully! </div>');
            }
            redirect('CJenis/index');
        }
    }
}
