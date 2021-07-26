<?php 
    // if(!$register["name_country"])
    // {
    //     include("connection.php");
    // }
    // $query="SELECT * FROM country ORDER BY country";
    // $executeQuery = $conexion->query($query);
    
    // while($register = $executeQuery->fetch_assoc())
    // {
    //     $name_country = utf8_encode($register["name_country"]);
    //     echo "<option value='$id_country'";
    //     if($name_country==utf8_decode($register["name_country"]))
    //     {
    //         echo " selected";
    //     }
    //     echo ">$name_country</option>";
    // }
      
    include("connection.php");
    $query="SELECT * FROM country ORDER BY name_country";
    $executeQuery = $connectiondb->query($query);
    while($register = $executeQuery->fetch_assoc()){
        $name = utf8_encode($register["name_country"]);
        $id = utf8_encode($register["id_country"]);
        echo "<option value='$id'>$name</option>";
    }

?>