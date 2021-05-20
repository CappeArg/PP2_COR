<?php

//Estoy probando GIT
//iniciamos sesión en la aplicación para guardar datos que permitan mostrar msjes.
session_start();

$conexion= mysqli_connect(
    'localhost',
    'root',
    '',
    'bbddcor'
);

// if(isset($conexion)){
//     echo "la base de datos está conectada";
// }

?>