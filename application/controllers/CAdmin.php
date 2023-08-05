<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('pages/Header', $data);
		$this->load->view('pages/Sidebar', $data);
		$this->load->view('Dashboard', $data);
		$this->load->view('pages/Footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('tbl_role')->result_array();

		$this->load->view('pages/Header', $data);
		$this->load->view('pages/Sidebar', $data);
		$this->load->view('admin/Role', $data);
		$this->load->view('pages/Footer');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('tbl_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('tbl_user_menu')->result_array();

		$this->load->view('pages/Header', $data);
		$this->load->view('pages/Sidebar', $data);
		$this->load->view('admin/RoleAccess', $data);
		$this->load->view('pages/Footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('tbl_user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('tbl_user_access_menu', $data);
		} else {
			$this->db->delete('tbl_user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}
}
