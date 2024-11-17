<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CRUD</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn btn-primary nav-link active" href="crear.php">Nuevo</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CORREO</th>
      <th>TELEFONO</th>
      <th>FECHA</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "conexion.php";
    $sql = "select * from crud";
    $result = $conn->query($sql);
    if(!$result){
        die("Consulta inválida");
    }
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
          <th>{$row['id']}</th>
          <td>{$row['nombre']}</td>
          <td>{$row['correo']}</td>
          <td>{$row['telefono']}</td>
          <td>{$row['join_date']}</td>
          <td>
            <a class='btn btn-success' href='editar.php?id={$row['id']}'>Editar</a>
            <a class='btn btn-danger' href='borrar.php?id={$row['id']}'>Borrar</a>
          </td>
        </tr>
        ";
    }
    ?>
  </tbody>
</table>


   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>