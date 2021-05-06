<?php

$connection = mysqli_connect(
  'localhost', 'root', '', 'students'
);
$pdo = new PDO('mysql:host=localhost; dbname=students', "root", "");

//for testing connection
// if($connection) {
//  echo 'database is connected';
// }

?>