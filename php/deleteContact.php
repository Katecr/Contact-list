<?php 
    $email = $_POST["email_slc"];
    include("connection.php");

    $query="DELETE FROM user WHERE email='$email'";

    $executeQuery = $connectiondb->query(utf8_encode($query));

    if($executeQuery)
        $message = "El contacto con el email <b>$email</b> ha sido eliminado :(";
    else
        $message = "No se pudo eliminar el contacto con el email <b>$email</b> :/";

    $connectiondb->close();
    header("Location: ../index.php?op=low&message=$message");

?>