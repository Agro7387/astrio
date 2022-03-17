<?php

require 'Ibox.php';
require 'AbstaractBox.php';
require 'DbBox.php';
require 'FileBox.php';

use Box\FileBox;
use Box\DbBox;

$box = FileBox::getInstance();
$box->setData(3, 'test1');
$box->save();

$dbBox = DbBox::getInstance();
$dbBox->setData(4, 'test8');
$dbBox->save();
$dbBox->load();