<?php
require_once './autoload.php';
use models\Amodel;
use models\Bmodel;

$a = new Amodel();
$a->index();
$b = new Bmodel();
$b->index();