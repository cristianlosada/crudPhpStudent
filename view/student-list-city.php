<?php

include('database.php');

$query = "SELECT * FROM ciudad";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query Failed' . mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id' => $row['id_ciudad'],
        'nombre' => $row['nombrec'],

    );
}
//header('Content-Type: application/json');
$jsonstring = json_encode($json);

echo $jsonstring;

?>