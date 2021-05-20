<?php
include ("db.php");
//Traigo los datos para editar la noticia
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query = "SELECT * FROM noticias WHERE ID = $id";
    $resultado = mysqli_query($conexion,$query);
    if(mysqli_num_rows($resultado)==1){
        $fila = mysqli_fetch_array($resultado);
        $titulo = $fila['TITULO'];
        $cuerpo = $fila['TEXTO'];
        $imagen = $fila['IMAGEN'];

        // echo $titulo;
        // echo "<br>";
        // echo $cuerpo;
        // echo "<br>";
        // echo $imagen;
    }
}

//Traigo los datos del formulario para grabar la noticia en la BD

if(isset($_POST['actualizar'])){
    $id;
    $titulo=$_POST['titulo'];
    $cuerpo=$_POST['cuerpo'];
    $imagen=$_POST['img'];

    $query = "UPDATE noticias SET TITULO = '$titulo', TEXTO = '$cuerpo', IMAGEN = '$imagen' WHERE id = $id";
    $resultado = mysqli_query($conexion,$query);
    $_SESSION['mensaje'] = "Noticia actualizada correctamente";
    $_SESSION['tipo_mensaje'] = "success";
    header("Location:crud_noticias.php");
}

?>
<?php include("includes/header.php") ?>

<div class="container" p-4>

    <div class="row">
        <div class="col-md-4 mx-auto">

            <div class="card card-body">
            <h1>Editar Noticia</h1>
            <br>
                <form action="editar_noticias.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control"
                        placeholder="Editar Título">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="cuerpo" rows="10" class="form-control" placeholder="Agregar cuerpo noticia"><?php echo $cuerpo;?></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" name="img" value="<?php echo $imagen ?>" >
                    </div>
                    <br>
                    <button class="btn btn-success" name="actualizar">
                    ACTUALIZAR
                    </button>
            

                </form>

            </div>

        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>