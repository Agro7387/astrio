<?php

namespace Box;

interface IBox
{
    public function setData($key, $value);
    public function getData($key);
    public function save();
    public function load();
}
