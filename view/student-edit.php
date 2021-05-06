<?php

  include('database.php');

if(isset($_POST['id'])) {
    // echo $_POST['id'] ;
  $id = $_POST['id'];

  $student_identificacion = $_POST['identificacion'];
  $student_nombre = $_POST['nombre'];
  $student_fecha = $_POST['fecha'];
  $student_ciudad = $_POST['ciudad'];
  $student_edad = $_POST['edad'];
  $student_departamento = $_POST['departamento'];
  

  $query = "UPDATE estudiante SET identificacion = $student_identificacion, nombre = '$student_nombre', fecha_nac = '$student_fecha', id_ciudad = $student_ciudad, id_departamento = $student_departamento, edad = $student_edad WHERE id_estudiante = '$id'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "Task Update Successfully";  

}

?>