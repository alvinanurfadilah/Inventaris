<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MPasien', 'pasien');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'data' => $this->pasien->show()
        ];
        $this->load->view('pages/Header');
        $this->load->view('pages/Sidebar');
        $this->load->view('Pasien/Pasien', $data);
        $this->load->view('pages/Footer');
    }

    public function form()
    {
        $data = [
            'data' => $this->pasien->show()
        ];
        $this->load->view('pages/Header');
        $this->load->view('pages/Sidebar');
        $this->load->view('Pasien/FormPasien', $data);
        $this->load->view('pages/Footer');
    }

    public function index_post()
    {
        $data = [
            'slug' => str_replace(' ', '-', strtolower($this->input->post('first_name'))),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'gender' => $this->input->post('gender'),
            'birth_date' => $this->input->post('birth_date'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_pasien', $data);
        redirect('CPasien/index');
    }
}
