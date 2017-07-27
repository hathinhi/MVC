<?php

class Migration_Add_column extends Migration {
    public function up() {
        $this->_add_table_users();
    }

    private function _add_table_users() {
        $sql = "ALTER TABLE users ADD deleted int NULL DEFAULT 0 ;";
        $this->db->query_struct($sql);

    }

    public function down() {
        var_dump("down");
    }
}