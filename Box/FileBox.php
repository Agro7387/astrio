<?php

namespace Box;

class FileBox extends AbstaractBox
{
    const FILE = 'log.txt';

    private $file;
    private $savedData;

    protected function __construct()
    {
       $this->file = @fopen(self::FILE, 'a+');
    }

    public function save()
    {
        $this->load();
        $savedData = $this->savedData;
        if (!empty($savedData)) {
            foreach ($savedData as $key => &$value) {
                if ($key === key($this->data)) {
                    $value = $this->data[$key];
                } else {
                    $savedData += $this->data;
                }
            }
        } else {
            $savedData = $this->data;
        }
        ftruncate($this->file, 0);
        fwrite($this->file, serialize($savedData));
        fclose($this->file);
    }

    public function load()
    {
        $this->savedData = unserialize(fread($this->file, @filesize(self::FILE)));
    }
}