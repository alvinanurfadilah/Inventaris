<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property MMenu $menu
 * @property MSubMenu $sub_menu
 * @property Session $session
 * @property db $db
 * @property input $input
 * @property form_validation $form_validation
 */

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('MMenu', 'menu');
        $this->load->model('MSubMenu', 'sub_menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pages/Header', $data);
            $this->load->view('pages/Sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('pages/Footer');
        } else {
            $this->db->insert('tbl_user_menu', [
                'slug' => str_replace(' ', '-', strtolower($this->input->post('menu'))),
                'menu' => $this->input->post('menu'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added! </div>');
            redirect('Menu/index');
        }
    }

    function edit($slug)
    {
        $where = array('slug' => $slug);
        $data['data'] = $this->menu->edit_data($where, 'tbl_user_menu');
        $row = ['id' => $data['id']];
        $this->load->view('menu/index', $row);
    }

    function update()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');

        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('menu'))),
            'menu' => $menu,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $where = array(
            'id' => $id
        );

        $this->menu->update_data($where, $data, 'tbl_user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu updated successfully! </div>');
        redirect('Menu/index');
    }

    public function delete($slug)
    {
        if (@$slug) {
            $idslug = ['slug' => $slug];
            $get = $this->menu->get($idslug);

            if ($get->num_rows() == 1) {
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $this->menu->delete($id, 'tbl_user_menu');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Menu deleted successfully! </div>');
            }
            redirect('Menu/index');
        }
    }

    // Sub Menu

    public function subMenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('v_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Sub Menu', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pages/Header', $data);
            $this->load->view('pages/Sidebar', $data);
            $this->load->view('menu/subMenu', $data);
            $this->load->view('pages/Footer');
        } else {
            $data = [
                'slug' => str_replace(' ', '-', strtolower($this->input->post('title'))),
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('tbl_user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New sub menu added! </div>');
            redirect('Menu/subMenu');
        }
    }

    function editSubMenu($slug)
    {
        $where = array('slug' => $slug);
        $data['data'] = $this->sub_menu->edit_data($where, 'tbl_user_sub_menu');
        $row = ['id' => $data['id']];
        $this->load->view('menu/subMenu', $row);
    }

    function updateSubMenu()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $menu_id = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');

        $data = array(
            'slug' => str_replace(' ', '-', strtolower($this->input->post('title'))),
            'title' => $title,
            'menu_id' => $menu_id,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_user_sub_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Sub Menu updated successfully! </div>');
        redirect('Menu/subMenu');
    }

    public function deleteSubMenu($slug)
    {
        if (@$slug) {
            $idslug = ['slug' => $slug];
            $get = $this->sub_menu->show($idslug);

            if ($get->num_rows() == 1) {
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $this->sub_menu->delete($id, 'tbl_user_sub_menu');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Sub Menu deleted successfully! </div>');
            }
            redirect('Menu/subMenu');
        }
    }
}
