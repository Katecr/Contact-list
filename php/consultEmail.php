<br />
<div>
	<input type="hidden" name="op" value="consults" />
	<label for="email">Email: </label>
	<input type="email" id="email" class="change" name="email_txt" placeholder="Escribe tu email" title="Tu email"/>
</div>
<input type="submit" id="send-search" class="change" name="send_btn" value="buscar" />
<?php 
    if($_GET["email_txt"]!=null){
        $email=$_GET["email_txt"];
        $query = "SELECT * FROM user WHERE email like '%$email%'";
        include("resultsTable.php");
    }
?>