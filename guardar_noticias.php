<?php  

//Conexion BD
include ("db.php");

//Recibo variables Crud Noticias
$titulo = $_POST['titulo'];
$cuerpo = $_POST['cuerpo'];
$imagen = $_POST['img'];

$query="INSERT INTO noticias (TITULO, TEXTO, IMAGEN) VALUES ('$titulo', '$cuerpo', '$imagen')";

$resultado = mysqli_query($conexion,$query);

if(!$resultado){
    die("La consulta falló");
}

//guardamos el mensaje y el formato bootstrap en sesión
$_SESSION["mensaje"] = "Noticia guardada correctamente";
$_SESSION['tipo_mensaje'] ='success';

header("Location:crud_noticias.php");




// echo $titulo;
// echo "<br>";
// echo $cuerpo;
// echo "<br>";
// echo $imagen;




// if(isset($_POST['guardar_noticia'])){
//     echo 'guardando';
// }

?>