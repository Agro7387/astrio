<?php

namespace Box;

abstract class AbstaractBox implements IBox
{
    protected $data = [];
    private static $instances = [];

    protected function __construct() {}

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getData($key)
    {
        return $this->data[$key];
    }

    public abstract function save();
    public abstract function load();


    public static function getInstance(): AbstaractBox
    {
        $subclass = get_called_class();
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
}