<?php 
    if(isset($_GET["message"]))
    {
        $message = $_GET["message"];
        echo "<br /><span class='messages'>$message</span><br />";
    }
?>