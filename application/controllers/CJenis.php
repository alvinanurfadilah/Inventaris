<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CJenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = strtolower(get_class($this));
        if (file_exists(APPATH . 'models/' . ucfirst($model) . 'MJenis.php')) {
            $this->load->model(ucfirst($model) . 'MJenis', $model, true);
        }
    }

    public function view($data)
    {
        $this->load->view('Master/VJenis', $data);
    }

    public function index_post($slug='')
    {
        $jsonArray = json_decade($this->input->raw_input_stream, true);
        $postReal = $this->form_validation->set_data($jsonArray);

        if (!$slug) {
            $this->form_validation->set_rules('name', 'Jenis Obat', 'trim|required', [
                'required' => '%s Required'
            ]);
        }

        if ($this->form_validation->run() == FALSE && !$slug) {
            $this->response([
                'status' => FALSE,
                'title' => 'Invalid input reuired',
                'message' => validation_errors()
            ]);
        }else {
            if(@$slug){
                if(@$slug && @$jsonArray['name']){
                    $arr['jenis'] = $jsonArray['name'];
                }
            }else{
                $arr = [
                    'slug' => str_replace(' ', '-', strtolower($jsonArray ['jenis'])),
                    'jenis' => $jsonArray['name']
                ];
            }
            if(!$slug){
                $arr['created_at'] = date('Y-m-d H:i:s');

                $ins = $this->jenis->insert($arr);
                if($ins){
                    $this->response([
                        'status' => TRUE,
                        'title' => 'Successful Created',
                        'message' => 'Jenis Obat was successful created!'
                    ]);
                }else{
                    $this->response([
                        'status' => FALSE,
                        'title' => 'Error Created',
                        'message' => 'Jenis Obat was error created!'
                    ]);
                }
            }else{
                $idslug = ['slug' => $slug];
                $row = $this->jenis->show($idslug)->row_array();
                $id = ['id' => $row['id']];

                $arr['slug'] = str_replace(' ', '-', strtolower($jsonArray ['name']));
                $arr['updated_at'] = date('Y-m-d H:i:s');
                $upd = $this->jenis->update($id, $arr);

                if($upd){
                    $this->response([
                        'status' => TRUE,
                        'title' => 'Successful Update',
                        'message' => 'Jenis Obat : '.$jsonArray['name'].' was successful update!'
                    ]);
                }else{
                    $this->response([
                        'status' => FALSE,
                        'title' => 'Error Update',
                        'message' => 'Jenis Obat was error update!'
                    ]);
                }
            }
        }
    }

    public function index_get($slug='')
    {
        if(@$slug){
            $get = $this->jenis->show(['slug' => $slug]);
            $data = $get->row_array();
        }else{
            $get = $this->jenis->show();
            $data = $get->result_array();
        }
        if($get->num_rows() > 0){
            $this->response([
                'status' => TRUE,
                'title' => 'Success get Jenis Obat',
                'data' => $data
            ]);
        }else{
            $this->response([
                'status' => FALSE,
                'title' => 'Jenis Obat not found',
                'data' => []
            ]);
        }
    }

    public function index_delete($slug)
    {
        if(@$slug){
            $idslug = ['slug' => $slug];
            $get = $this->jenis->show($idslug);

            if($get->num_rows() == 1){
                $data = $get->row_array();
                $id = ['id' => $data['id']];
                $del = $this->jenis->delete($id);
                if($del){
                    $this->response([
                        'status' => TRUE,
                        'title' => 'Success delete one Jenis Obat',
                        'message' => 'Jenis Obat : '.$data['name'].' was deleted!'
                    ]);
                }else{
                    $this->response([
                        'status' => FALSE,
                        'title' => "Jenis Obat can't deleted",
                        'message' => "Can't deleted Jenis Obat"
                    ]);
                }
            }else{
                $this->response([
                    'status' => FALSE,
                    'title' => 'Jenis Obat not found',
                    'message' => "ID Jenis Obat can't found!"
                ]);
            }
        }else{
            $this->response([
                'status' => FALSE,
                'title' => 'ID Jenis Obat was required',
                'message' => 'ID Jenis Obat must be required'
            ]);
        }
    }
}
?>