<?php
    include "conexion.php";
    $id = "";
    $nombre = "";
    $correo = "";
    $telefono = "";
    $completado = "";


if($_SERVER["REQUEST_METHOD"] == 'GET'){
   if(!isset($_GET['id'])){
    header("location:CRUD/index.php");
    exit;
   } 
   $id = $_GET['id'];
   $sql = "select * from crud where id=$id";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   while(!$row){
    header("location:CRUD/index.php");
    exit;
   }
   $nombre = $row["nombre"];
   $correo = $row["correo"];
   $telefono = $row["telefono"];
}else{
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
  
    $sql = "update crud set nombre= '$nombre', correo='$correo', telefono='$telefono'
    where id='$id'";
    $result = $conn->query($sql);
   $completado = "Registro actualizado";
}
  
?>
<!DOCTYPE html>
<html>
<head>
 <title>CRUD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">  Editar </h1>
 </div><br>

<input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
<br>

 <label> NOMBRE: </label>
 <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"> <br>

 <label> CORREO: </label>
 <input type="text" name="correo" value="<?php echo $correo; ?>" class="form-control"> <br>

 <label> TELEFONO: </label>
 <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
 <?php
    if (isset($completado)) {
        echo "<p>$completado</p>";
    }

 ?>

 </div>
 </form>
 </div>
</body>
</html>