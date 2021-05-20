<?php include ("db.php")?>
<?php include ("includes/header.php")?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">
        <?php if(isset($_SESSION['mensaje'])){?>

<!-- mensaje de noticia creada correctamente -->
        <div class="alert alert-<?= $_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['mensaje']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php //elimino los datos de sesión
        session_unset();} ?>
            <div class="card card-body">

                <form action="guardar_noticias.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control"
                        placeholder="Titulo de la Noticia" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="cuerpo" class="form-control"
                        placeholder="Ingrese el cuerpo de la noticia" rows="10" class="form-control"></textarea>    

                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" name="img" class="form-control"
                        placeholder="Enlace a imagen de la noticia" >
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block"
                    name="guardar_noticia" value="Publicar Noticia">
                </form>

            </div>

        </div>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
            <?php 
            
            $query= "SELECT * FROM noticias";
            $resultado_noticias = mysqli_query($conexion, $query);
            
            while($fila=mysqli_fetch_array($resultado_noticias)){?>

            <tr>
            <td><?php echo $fila['TITULO'];?></td>
            <td><?php echo $fila['FECHA'];?></td>
            <td>
                <a class="btn btn-secondary" href="editar_noticias.php?id=<?php echo $fila['ID']?>">
                <i class="far fa-edit"></i>
                </a> 
                <a class="btn btn-danger" href="eliminar_noticias.php?id=<?php echo $fila['ID']?>">
                <i class="far fa-trash-alt"></i>
                </a>
            </td>

            </tr>

            <?php }?>
            </tbody>
        </table>
    </div>

</div>

</div>


<?php include ("includes/footer.php") ?>
