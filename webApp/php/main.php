<?php

    include 'config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Create
        
        $nombre = $_POST['nombre'];
        $especie = $_POST['especie'];
        $habitat = $_POST['habitat'];
        $edad = $_POST['edad'];

        $ans = create($nombre, $especie, $habitat, $edad);
        echo json_encode($ans);

    }else if ($_SERVER['REQUEST_METHOD'] == 'GET') { //Read
        if(isset($_GET['id'])){
            $ans = readById($_GET['id']);
            echo json_encode($ans);
        }else{
            $ans = read();
            echo json_encode($ans);
        }
        
    }else if ($_SERVER['REQUEST_METHOD'] == 'PUT'){ //Update
        parse_str(file_get_contents("php://input"),$post_vars);
        $ans = update($post_vars['id'], $post_vars['nombre'], $post_vars['especie'], $post_vars['habitat'], $post_vars['edad']);
        echo json_encode($ans);

    }else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){ //Delete
        parse_str(file_get_contents("php://input"),$post_vars);
        $ans = delete($post_vars['id']);
        echo json_encode($ans);
    }

    /*
    Recibe los valores y los registra dentro de la base de datos
    @nombre El nombre del animal.
    @especie El nombre de la especie.
    @habitat El habitat de la especie.
    @edad La edad del animal.
    */
    function create($nombre, $especie, $habitat, $edad){
        
        //Sentencia a ejecutar.
        $sql = "INSERT INTO animales (nombre, especie, habitat, edad) VALUES ('$nombre', '$especie', '$habitat', '$edad')";
        
        //Obtiene la conexión a la base de datos.
        $conn = get_dbc();

        //Ejecuta la sentencia y comprueba si se ha realizado con exito.
        if($conn->query($sql) === TRUE){
            $conn->close();
            return array(
                "status" => 1,
                "mensaje" => "Se ha agregado el registro exitosamente!"
            );
        }else{
            $error = $conn->error;
            $conn->close();
            return array(
                "status" => 0,
                "mensaje" => "Ha sucedido un error, no se realizo el registro!",
                "error" => $error
            );
        }
    }

    /*
    Recibe todos los registros que se encuentran en la base de datos
    */
    function read(){
        //Sentencia a ejecutar.
        $sql = "SELECT * FROM animales";

        //Obtiene la conexión a la base de datos.
        $conn = get_dbc();

        //Realiza la sentencia y cierra la conexión
        $result = $conn->query($sql);
        $conn->close();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $ans[] = $row;
            }
            return array(
                "status" => 1,
                "data" => $ans
            );
        }else{
            return array(
                "status" => 0,
                "mensaje" => "Ha sucedido un error, no se pudo obtener la informacion!",
            );
        }
    }

    /*
    Recibe un id y lo busca dentro de la base de datos
    @id Id a buscar dentro de la base de datos
    */
    function readById($id){
        //Sentencia a ejecutar.
        $sql = "SELECT * FROM animales WHERE id = '$id'";

        //Obtiene la conexión a la base de datos.
        $conn = get_dbc();

        //Realiza la sentencia y cierra la conexión
        $result = $conn->query($sql);
        $conn->close();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $ans[] = $row;
            }
            return array(
                "status" => 1,
                "data" => $ans
            );
        }else{
            return array(
                "status" => 0,
                "mensaje" => "No se ha encontrado ningun animal con el id: $id!",
            );
        }
    }

    /*
    Recibe los valores y los actualiza dentro de la base de datos
    @id El id del animal que se desea actualizar.
    @nombre El nombre del animal.
    @especie El nombre de la especie.
    @habitat El habitat de la especie.
    @edad La edad del animal.
    */
    function update($id, $nombre, $especie, $habitat, $edad){
        
        //Sentencia a ejecutar.
        $sql = "UPDATE animales SET nombre = '$nombre', especie = '$especie', habitat = '$habitat', edad = '$edad' WHERE id = '$id'";
        
        //Obtiene la conexión a la base de datos.
        $conn = get_dbc();

        //Ejecuta la sentencia y comprueba si se ha realizado con exito.
        if($conn->query($sql) === TRUE){
            $conn->close();
            return array(
                "status" => 1,
                "mensaje" => "Se ha actualizado el registro exitosamente!"
            );
        }else{
            $error = $conn->error;
            $conn->close();
            return array(
                "status" => 0,
                "mensaje" => "Ha sucedido un error, no se actualizo el registro!",
                "error" => $error
            );
        }
    }

    /*
    Recibe el id de un animal y lo elimina de la base de datos
    @id El id del animal que se desea eliminar.
    */
    function delete($id){
        
        //Sentencia a ejecutar.
        $sql = "DELETE FROM animales WHERE id = '$id'";
        
        //Obtiene la conexión a la base de datos.
        $conn = get_dbc();

        //Ejecuta la sentencia y comprueba si se ha realizado con exito.
        if($conn->query($sql) === TRUE){
            $conn->close();
            return array(
                "status" => 1,
                "mensaje" => "Se ha eliminado el registro exitosamente!"
            );
        }else{
            $error = $conn->error;
            $conn->close();
            return array(
                "status" => 0,
                "mensaje" => "Ha sucedido un error, no se elimino el registro!",
                "error" => $error
            );
        }
    }
?>