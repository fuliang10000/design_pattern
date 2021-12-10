<?php
//string(38) "mysql:host=127.0.0.1;dbname=adorawe_db" string(4) "root" string(9) "fl6037077" NULL
$pdo = new PDO('mysql:host=127.0.0.1;dbname=adorawe_db', 'root', 'fl6037077');
var_dump($pdo);

yield $pdo;