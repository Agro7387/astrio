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
        $sql = 'INSERT INTO `table` (`key`, `value`) VALUES'
        . '(' . key($this->data) . ', ' . "'{$this->data[key($this->data)]}'" . ')';

        $this->load();
        $savedData = $this->savedData;
        if (!empty($savedData)) {
            foreach ($savedData as $key => $value) {
                if ($key === key($this->data)) {
                    $sql = 'UPDATE `table` SET `value` =' . $this->data[$key]
                    . 'WHERE `key` = '. $key;
                }
            }
        }

        $this->mysqli->query($sql);
    }

    public function load()
    {
        $saved_data = [];
        $query = $this->mysqli->query("SELECT `key`, `value` FROM `table`");
        while ($row = $query->fetch_assoc()) {
            $savedData[$row['key']] = $row['value'];
        }

        $this->savedData = $saved_data;
    }
}