  
<?php

include('database.php');

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($connection, $_POST['id']);

  $query = "SELECT * from estudiante WHERE id_estudiante = {$id}";

  $result = mysqli_query($connection, $query);

  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();

  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      
      'id' => $row['id_estudiante'],
        'identificacion' => $row['identificacion'],
        'nombre' => $row['nombre'],
        'fecha' => $row['fecha_nac'],
        'ciudad' => $row['id_ciudad'],
        'departamento' => $row['id_departamento'],
        'edad' => $row['edad']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

?>