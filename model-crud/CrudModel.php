<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 27/07/2017
 * Time: 16:25
 */
class CrudModel extends Model {

    public function listData() {
        $this->db->select();
        $this->db->from($this->_table);
        if ($this->_deleted) {
            $this->db->where($this->_deleted, 0);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->query_db();
    }

    public function edit($id) {
        return $this->db->get($this->_table, $id);
    }

    public function insert($data) {
        $result = $this->db->insert($this->_table, $data);
        return $result;

    }

    public function update($id, $data) {
        $result = $this->db->update($id, $this->_table, $data);
        return $result;
    }

    public function delete($id) {
        $result = $this->db->delete($id, $this->_table, $this->_deleted);
        return $result;
    }
}