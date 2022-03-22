<?php

namespace Box;

use mysqli;

class DbBox extends AbstaractBox
{
    public $savedData;
    public $mysqli;

    protected function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root', 'root', 'test_db');
    }

    public function save()
    {
        $is_key_exists = $this->mysqli->query(
            'SELECT `key`, `value` FROM `table` WHERE `key`=' . key($this->data)
        );

        if ($is_key_exists -> num_rows > 0) {
            $params = $is_key_exists->fetch_assoc();
            $sql = 'UPDATE `table` SET `value` = ' . "'{$params['value']}'" . ' WHERE `key` = ' . $params['key'];

        } else {
            $sql = 'INSERT INTO `table` (`key`, `value`) VALUES (' . key($this->data) . ', ' . "'{$this->data[key($this->data)]}'" . ')';
        }

        $this->mysqli->query($sql);
    }

    public function load()
    {
        $_savedData = [];
        $query = $this->mysqli->query("SELECT `key`, `value` FROM `table`");
        while ($row = $query->fetch_assoc()) {
            $_savedData[$row['key']] = $row['value'];
        }

        $this->savedData = $_savedData;
    }
}