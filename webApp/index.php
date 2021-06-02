<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Index CSS -->
    <link rel="stylesheet" href="css/index.css">
    
    <title>Web-app</title>

</head>
<body>
    <div class="row p-0 m-0">
        
    </div>
    <div class="container mt-5">
        <div class="row p-0 m-0">
            <h2>Animales</h2>            
            <button id="btnAgregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnimal">Agregar</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Habitat</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <a>Ivan Alexis Contreras Duarte #10904</a>
    </div>

    <!-- The Modal -->
    <div class="modal" id="modalAnimal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar animal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form onsubmit="return false">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="especie">Especie:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el especie" id="especie">
                    </div>
                    <div class="form-group">
                        <label for="habitat">Habitat:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el habitat" id="habitat">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" placeholder="Ingresa la edad" id="edad">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>