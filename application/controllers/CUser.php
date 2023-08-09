<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MUser', 'user');
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->user->getUser();
        $data['role'] = $this->db->get('tbl_role')->result_array();

        $this->load->view('pages/Header', $data);
        $this->load->view('pages/Sidebar', $data);
        $this->load->view('admin/User', $data);
        $this->load->view('pages/Footer');
    }

    function edit($id)
    {
        $where = array('id' => $id);
        $data['data'] = $this->user->edit_data($where, 'tbl_user');
        $row = ['id' => $data['id']];
        $this->load->view('admin/User', $row);
    }

    function update()
    {
        $id = $this->input->post('id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');

        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('first_name'))),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $id = $this->input->post('id');
        $where = $id;

        $table = 'tbl_user';
        $this->user->update_data($where, $data, $table);
        redirect('CUser/index');
    }
}
