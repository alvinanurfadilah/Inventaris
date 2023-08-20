<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUser extends CI_Model
{
    public function getUser()
    {
        $query = "SELECT `tbl_user`.*, `tbl_role`.`id`, `tbl_role`.`role`
        FROM `tbl_user` JOIN `tbl_role`
        ON `tbl_user`.`role_id` = `tbl_role`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where('id', $where);
        $this->db->update('tbl_user', $data);
    }
}
