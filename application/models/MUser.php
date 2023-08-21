<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUser extends CI_Model
{
    private $tbl = 'tbl_user';

    public function show($where = '')
    {
        $this->db->select('*');
        $this->db->from($this->tbl);
        if (@$where && $where != null) {
            $this->db->where($where);
        }
        $this->db->order_by('id', 'asc');
        return $this->db->get();
    }

    public function getUser()
    {
        $query = "SELECT `tbl_user`.`id`, `tbl_user`.`first_name`, `tbl_user`.`last_name`, `tbl_user`.`email`, `tbl_user`.`role_id`, `tbl_user`.`is_active`, `tbl_role`.`role`
        FROM `tbl_user` JOIN `tbl_role`
        ON `tbl_user`.`role_id` = `tbl_role`.`id`";

        return $this->db->query($query);
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
