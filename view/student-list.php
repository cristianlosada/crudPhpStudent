<?php

include('database.php');

//$query = "SELECT * FROM estudiante";
$query = "SELECT  e.*, c.nombrec, d.nombred FROM estudiante AS e JOIN ciudad AS c ON c.id_ciudad = e.id_ciudad JOIN departamento AS d ON d.id_departamento = e.id_departamento";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query Failed' . mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id' => $row['id_estudiante'],
        'identificacion' => $row['identificacion'],
        'nombre' => htmlspecialchars($row['nombre']),
        'fecha' => $row['fecha_nac'],
        // 'idciudad' => $row['id_ciudad'],
        // 'iddepartamento' => $row['id_departamento'],
        'ciudad' => $row['nombrec'],
        'departamento' => $row['nombred'],
        'edad' => $row['edad']
       
        

    );
}
//header('Content-Type: application/json');
$jsonstring = json_encode($json);

echo $jsonstring;

?>
