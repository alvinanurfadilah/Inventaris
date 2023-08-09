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
        $data['title'] = 'Pasien';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->pasien->show();
        $this->load->view('pages/Header', $data);
        $this->load->view('pages/Sidebar', $data);
        $this->load->view('Pasien/Pasien', $data);
        $this->load->view('pages/Footer');
    }

    public function index_post()
    {
        $this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
        $this->form_validation->set_rules('last_name', 'Nama Belakang', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('phone', 'No. HP', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            redirect('CPasien');
        } else {
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New pasien added! </div>');
            redirect('CPasien/index');
        }
    }

    function edit($slug)
    {
        $where = array('slug' => $slug);
        $data['data'] = $this->jenis->edit_data($where, 'tbl_pasien');
        $row = ['id' => $data['id']];
        $this->load->view('Pasien/Pasien', $row);
    }

    function update()
    {
        $id = $this->input->post('id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $gender = $this->input->post('gender');
        $birth_date = $this->input->post('birth_date');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');

        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('first_name'))),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender,
            'birth_date' => $birth_date,
            'address' => $address,
            'phone' => $phone,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $where = array(
            'id' => $id
        );

        $this->pasien->update_data($where, $data, 'tbl_pasien');
        //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pasien updated successfully! </div>');
        redirect('CPasien/index');
    }

    public function delete($slug)
    {
        if (@$slug) {
            $idslug = ['slug' => $slug];
            $get = $this->pasien->show($idslug);

            if ($get->num_rows() == 1) {
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $this->pasien->delete($id, 'tbl_pasien');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Pasien deleted successfully! </div>');
            }
            redirect('CPasien/index');
        }
    }
}
