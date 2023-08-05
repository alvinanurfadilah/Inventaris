<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMenu extends CI_Model
{

    // private $tbl = 'tbl_user_menu';
    // public function show($where = '')
    // {
    //     $this->db->select('*');
    //     $this->db->from($this->tbl);
    //     if (@$where && $where != null) {
    //         $this->db->where($where);
    //     }
    //     $this->db->order_by('id', 'asc');
    //     return $this->db->get();
    // }

    public function getSubMenu()
    {
        $query = "SELECT `tbl_user_sub_menu`.*, `tbl_user_menu`.`menu`
        FROM `tbl_user_sub_menu` JOIN `tbl_user_menu`
        ON `tbl_user_sub_menu`.`menu_id` = `tbl_user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->tbl);
        return (($this->db->affected_rows() > 0) ? true : false);
    }
}
