<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $option =$_GET["op"];
    switch ($option) {
        case 'high':
            $content = "php/highContact.php";
            $title = "Alta de contactos";
            break;
        case 'low':
            $content = "php/lowContact.php";
            $title = "Alta de contactos";
            break;
        case 'change':
            $content = "php/changesContact.php";
            $title = "Alta de contactos";
            break;
        case 'consults':
            $content = "php/consultsContact.php";
            $title = "Alta de contactos";
            break;        
        default:
            $content = "php/home.php";
            $title = "Mis contactos";
            break;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
    <title><?php echo $title; ?></title>
</head>
<body>
    <section id="content">
        <nav>
            <ul>
                <li><a href="index.php" class="change">Inicio</a></li>
                <li><a href="?op=high" class="change">Alta de contactos</a></li>
                <li><a href="?op=low" class="change">Baja de contactos</a></li>
                <li><a href="?op=change" class="change">Cambios de contactos</a></li>
                <li><a href="?op=consults" class="change">Consultas de contacto</a></li>               
            </ul>
        </nav>
        <section id="primary">
            <?php include($content);?>
        </section>
    </section>
</body>
</html>