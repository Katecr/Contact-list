<?php 
    if(!$register_contact["country"])
    {
        include("connection.php");
    }
    $query="SELECT * FROM country ORDER BY name_country";
    $executeQuery = $connectiondb->query($query);
    
    while($register = $executeQuery->fetch_assoc())
    {
        $name_country = utf8_encode($register["name_country"]);
        echo "<option value='$name_country'";
        if($name_country==utf8_decode($register_contact["country"]))
        {
            echo " selected";
        }
        echo ">$name_country</option>";
    }
?>