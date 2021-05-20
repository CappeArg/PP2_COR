<?php

//PROBANDO GIT
include('db.php');

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM noticias WHERE ID = $id";
        $resultado = mysqli_query($conexion,$query);
        if (!$resultado){
            die("Fallo la query");
        }

        $_SESSION['mensaje'] = 'La noticia fue eliminada correctamente';
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: crud_noticias.php");
    }
?>