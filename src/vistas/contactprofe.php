¿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
      crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/contactus.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/c/c5/Gamers_logo.png" width="200" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
         data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 
         aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" href="#">Inicio <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="#">Lanzamientos</a>
            <a class="nav-link" href="#">Modo de Juego</a>
            <a class="nav-link" href="#">Ofertas</a>
          </div>
        </div>
    </nav>

    <main>
        <div id="alert" class="alert alert-default" role="alert">
        </div>
        <div class="container">
            <form id="frmContacto">
                <div class="form-group">
                    <label for="txtNombre">Nombre Completo</label>
                    <input id="txtNombre" name="txtNombre" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="txtEmail">Correo Electrónico</label>
                    <input id="txtEmail" name="txtEmail" class="form-control" type="email">
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Telefono</label>
                    <input id="txtTelefono" name="txtTelefono" class="form-control" type="tel">
                </div>
                <div class="form-group">
                    <label for="txtComentarios">Comentarios</label>
                    <textarea name="txtComentarios" id="txtComentarios" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="button" id="btnInsertar" class="btn btn-primary">Enviar Comentarios</button>
                <button type="button" id="btnActualizar" class="btn btn-success">Actualizar Comentarios</button>
                <button type="button" class="btn btn-danger">Regresar</button>
            </form>

            <table class="table table-striped">
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
                                        <button type='button' class='btn btn-danger' onClick='eliminar(".$fila['idComentario'].")'>Eliminar</button>
                                    </td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
              </table>

        </div>
    </main>

   
</body>
</html>
<script>
    function actualizar( idcomentario, nombre, email, telefono, comentario){
        //JS
        /*document.getElementById("txtNombre").value = nombre;
        document.getElementById("txtEmail").value = email;
        document.getElementById("txtTelefono").value = telefono;
        document.getElementById("txtComentarios").value = comentario;*/

        //JQuery
        $('#btnActualizar').show();
        $('#btnInsertar').hide();
        $('#hddIdComentario').prop("value",idcomentario);
        $('#txtNombre').prop("value",nombre);
        $('#txtEmail').prop("value",email);
        $('#txtTelefono').prop("value",telefono);
        $('#txtComentarios').prop("value",comentario);
    }

    function eliminar(idComentario){
      confirm("Deseas elimiar el comentario seleccionado?");
      function(respuesta){
        if (respuesta=='granted') {
          $.ajax({type:"POST", data: {"idComentario":idComentario}, url:"../controlador/clientesController.php?opc=3",
          success: function(data){
                        $('#alert').show();
                        $('#alert').text(data);
                        if( data == "Registro Insertado" ){
                            $('#alert').addClass("alert-success"); 
                        }else{
                            $('#alert').addClass("alert-danger"); 
                        }
                    }
                });
          
        }
      }
      

    }



    $(document).ready(function(){
        $('#btnActualizar').hide();
        $('#alert').hide();

        $('#btnInsertar').click(
            function(){
                var formData = $('#frmContacto').serialize();
                $.ajax({
                    type: "POST",
                    data: formData,
                    url: "../controlador/clientesController.php?opc=1",
                    success: function(data){
                        $('#alert').show();
                        $('#alert').text(data);
                        if( data == "Registro Insertado" ){
                            $('#alert').addClass("alert-success");
                        }else{
                            $('#alert').addClass("alert-danger");
                        }
                    }
                });
            }
        );


        $('#btnActualizar').click(
            function(){
                var formData = $('#frmContacto').serialize();
                $.ajax({
                    type: "POST",
                    data: formData,
                    url: "../controlador/clientesController.php?opc=2",
                    success: function(data){
                        $('#alert').show();
                        $('#alert').text(data);
                        if( data == "Registro Actualizado" ){
                            $('#alert').addClass("alert-success");
                        }else{
                            $('#alert').addClass("alert-danger");
                        }
                    }
                });
            }
        );
    });
</script>