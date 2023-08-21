<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property MUser $user
 * @property MRole $role
 * @property Session $session
 * @property db $db
 * @property input $input
 * @property form_validation $form_validation
 */

class CUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MUser', 'user');
        $this->load->model('MRole', 'role');
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->user->getUser();
        $data['role'] = $this->role->show();

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
        $role_id = $this->input->post('role');
        $is_active = $this->input->post('is_active');

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $where = [
            'id' => $id
        ];

        $this->user->update_data($where, $data, 'tbl_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User has been updated! </div>');
        redirect('CUser/index');
    }

    public function delete($id)
    {
        if (@$id) {
            $idslug = ['id' => $id];
            $get = $this->user->show($idslug);

            if ($get->num_rows() == 1) {
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $this->user->delete($id, 'tbl_user');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> User deleted successfully! </div>');
            }
            redirect('CUser/index');
        }
    }
}
