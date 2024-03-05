<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact expGames</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  
  rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
  crossorigin="anonymous"
/>



<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
/>
<script>src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Own styles -->
<link rel="stylesheet" href="./css/contact.css" />
<link rel="stylesheet" href="./css/style.css">
<!-- footer stles -->
</head>
<body class="bodyBgColor">

<!-- Contact us navbar-->
  <nav class="navbar navbar-expand-lg   ">
    <div class="container-fluid   ">
      <a class="navbar-brand" href="./index.html">Exp<b>GAMES</b></a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-md-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-5  mb-5 mb-lg-0 ml-auto">
          <li class=" center  nav-item  " id="Home">
            <a class="active px-3"
             aria-current="page" href="./index.html">Home</a>
          </li>

          <li class="center nav-item px-4" id="Discounts">
            <a class="active px-3" href="./discounts.html">Discounts</a>
          </li>

          <li class="center nav-item px-4">
            <a class="active px-3" href="#">Store</a>
          </li>

          <li class="center nav-item px-4">
            <a class="active px-3" href="./contact.html">Contact</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <main >
    <!-- USER FORM -->
    <!-- Style divs for form. -->
  <div class=" bg-body-tertiary p-5 rounded  bg-opacity-10">
    <!-- FUCKED UP BACKGROUND 'IMAGE' NO TOCAR O REPETIR-->
    <div class="bgContainer  z-n1 ">
      <div class="bgColors blueThree">
        <div class="bgColors blueTwo">
          <div class="bgColors blueOne">
            <div class="bgColors orangeThree">
              <div class="bgColors orangeTwo">
                <div class="bgColors orangeOne">
                  <div class="bgColors redOne"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="  col-sm-8 py-5 mx-auto bg-opacity-10  ">
      <!-- div surround form -->
      <div class="user-form container bg-opacity-10    ">

        <form class="border-2 border-danger bg-opacity-50 bg-dark  p-4 rounded-3   "  
        action="./controladores/clientescontroll.php/opc=1" method="post">
          <!-- Input fields go here -->
          <div class=" row g-3 ">
            <div class="col">
              <input placeholder="Nombre" class="form-control" type="text" id="nombre" name="nombre" required>
            </div>
            <div class="col">    
              <input placeholder="Telefono" class="form-control "  type="text" id="telefono" name="telefono" required>
            </div>
            <div class="col-12 ">
              <input placeholder="email" class="form-control "  type="email" name="email" id="email">
            </div>
          
            <div class="col-12 ">
              <textarea placeholder="comentarios" class="form-control " 
               name="comentarios" id="comentarios" cols="30" rows="10"></textarea>
            </div>
            <div class="col-2">
              <button type="button" id="btnActualizar" class="btn btn-primary ">enviar comentario</button>
              <button type="button" id="btnEliminar" class="btn btn-success ">Actualizar comentarios</button>
              <button type="button"  class="btn btn-danger ">Regresar</button>
            </div>
          </div>
      </form>
      <table class="table table-striped">
        <caption></caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Comentario</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        require_once("../modelos/Conexion.php");
                        require_once("../modelos/clientesModel.php");
                        $clientes = new ClientesModel();
                        $getComments = $clientes->SELECT();
                        if($getComments){
                            while ( $fila = $getComments->fetch_assoc() ) {
                                echo "<tr>";
                                    echo "<th scope='row'>1</th>";
                                    echo "<td>".$fila["nombre"].'</td>';
                                    echo "<td>".$fila["email"].'</td>';
                                    echo "<td>".$fila["telefono"].'</td>';
                                    echo "<td>".$fila["comentario"].'</td>';
                                    echo "<td>
                                        <button type='button' class='btn btn-success' onClick='actualizar(".$fila['idComentario'].",\"".$fila['nombre']."\",\"".$fila['email']."\",\"".$fila['telefono']."\",\"".$fila['comentario']."\")' >Actualizar</button>
                                        <button type='button' class='btn btn-danger' onClick='eliminar()'>Eliminar</button>
                                    </td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
              </table>


      </div>
    </div>
  </div>
  <!-- todo:
table tag thead th name, email telefono, comentario as examples -->
  <!-- END of form. -->
</main>

</body>
</html>
<script>
  function actualizar(idComentario, nombre, )
</script>