<?php 

    include("connection.php");
    $query="SELECT email FROM user ORDER BY email";
    $executeQuery = $connectiondb->query($query);

    while($register = $executeQuery->fetch_assoc()){
        echo "<option value='".utf8_encode($register["email"])."'>".utf8_encode($register["email"])."</option>";
    }
?>