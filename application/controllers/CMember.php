<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Session $session
 * @property db $db
 * @property input $input
 * @property form_validation $form_validation
 */

class CMember extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('pages/Header', $data);
		$this->load->view('pages/Sidebar', $data);
		$this->load->view('user/MyProfile', $data);
		$this->load->view('pages/Footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('pages/Header', $data);
			$this->load->view('pages/Sidebar', $data);
			$this->load->view('user/Edit', $data);
			$this->load->view('pages/Footer');
		} else {
			$email = $this->input->post('email');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');

			$this->db->set('first_name', $first_name);
			$this->db->set('last_name', $last_name);
			$this->db->where('email', $email);
			$this->db->update('tbl_user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your profile has been updated! </div>');
			redirect('CMember');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
		$this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('pages/Header', $data);
			$this->load->view('pages/Sidebar', $data);
			$this->load->view('user/ChangePassword', $data);
			$this->load->view('pages/Footer');
		} else {
			$currentPassword = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword1');
			if (!password_verify($currentPassword, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong current password! </div>');
				redirect('CMember/changePassword');
			} else {
				if ($currentPassword == $newPassword) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as current password! </div>');
					redirect('CMember/changePassword');
				} else {
					//password sudah ok
					$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

					$this->db->set('password', $passwordHash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tbl_user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password changed! </div>');
					redirect('CMember/changePassword');
				}
			}
		}
	}
}
