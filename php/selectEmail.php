<?php 

    include("connection.php");
    $query="SELECT email FROM user ORDER BY email";
    $executeQuery = $connectiondb->query($query);

    while($register = $executeQuery->fetch_assoc()){
        echo "<option value='".utf8_encode($register["email"])."'";
            if($_GET["contact_slc"]==$register["email"])
            {
                echo " selected";	
            }
        echo ">".utf8_encode($register["email"])."</option>";
        
    }
?>