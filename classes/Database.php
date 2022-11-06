<?php
// METHODS:
// 1. (C)REATE
// 2. (R)EAD
// 3. (U)PDATE
// 4. (D)ELETE
// 5. get_new_id
// 6. get_count_records
// 7. get_record
// 8. update_db

class Database
{
    public $db_file;
    public $db;
    public $db_user;

    public function __construct($url = '../db/user.json', $table = 'USER')
    {
        $this->db_file = $url;
        $this->db = json_decode(
            file_get_contents($this->db_file),
            true
        );
        $this->db_user = &$this->db[$table];
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function create($data)
    {
        $old_count_records = $this->get_count_records(); //for checking

        $this->db_user[] = $data;
        $this->update_db();

        if ($old_count_records + 1 == $this->get_count_records()) { //for checking
            return true;
        }
        return false;
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||


    public function read()
    {
        return $this->db_user;
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function update($id, $field, $new_value)
    {
        if (!($field == 'id')) { // field 'id' cannot be changed.
            $this->db_user[$id][$field] = $new_value;
            $this->update_db();
        }
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function delete($id)
    {
        $old_count_records = $this->get_count_records(); //for checking

        unset($this->db_user[$id]);
        $this->update_db();

        if ($old_count_records - 1 == $this->get_count_records()) { //for checking
            return true;
        }
        return false;
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function get_new_id()
    {
        if ($this->get_count_records() == 0) {
            $new_id = 0;
        } else {
            $new_id = 1 + end($this->db_user)['id'];
        }
        return (int)$new_id;
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function get_count_records()
    {
        return count($this->db_user);
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function get_record($id)
    {
        foreach ($this->db_user as $key => $value) {
            if ($value['id'] == $id) {
                return $this->db_user[$key];
            }
        }
        return null;
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    public function update_db()
    {
        file_put_contents($this->db_file, json_encode($this->db, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
    }

    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

}
