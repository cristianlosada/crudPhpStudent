<?php

  include('database.php');

if(isset($_POST['identificacion'])) {
    //echo $_POST['nombre'] . ', ' . $_POST['identificacion'];
    
    // $sentencia = $pdo->prepare("INSERT into estudiante(identificacion, nombre, fecha_nac, id_ciudad, id_departamento,edad) VALUES (:identificacion,:nombre, :fecha, :ciudad,:departamento, :edad)");
    // $sentencia=$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $student_identificacion = $_POST['identificacion'];
      $student_nombre = htmlspecialchars($_POST['nombre']);
      $student_fecha = $_POST['fecha'];
      $student_ciudad = $_POST['ciudad'];
      $student_edad = $_POST['edad'];
      $student_departamento = $_POST['departamento'];

      $sentencia = $pdo->prepare("INSERT into estudiante(identificacion, nombre, fecha_nac, id_ciudad, id_departamento,edad) VALUES (?,?,?,?,?,?)");
    
    // $sentencia->bindValue(":identificacion", $student_identificacion);
    // $sentencia->bindValue(":nombre", $student_nombre);
    // $sentencia->bindValue(":fecha", $student_fecha);
    // $sentencia->bindValue(":ciudad", $student_ciudad);
    // $sentencia->bindValue(":edad", $student_edad);
    // $sentencia->bindValue(":departamento", $student_departamento);
    
    $sentencia->execute([$student_identificacion,$student_nombre, $student_fecha, $student_ciudad,$student_departamento,$student_edad]);

//     $student_identificacion = $_POST['identificacion'];
//   $student_nombre = $_POST['nombre'];
//   $student_fecha = $_POST['fecha'];
//   $student_ciudad = $_POST['ciudad'];
//   $student_edad = $_POST['edad'];
//   $student_departamento = $_POST['departamento'];
//   $result = mysqli_query($connection, $query);

  if (!$sentencia) {
    die('Query Failed, repeated identification value ');
  }

  echo "Task Added Successfully";  

}

?>