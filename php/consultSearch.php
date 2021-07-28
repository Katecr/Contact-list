<br />
<div>
	<input type="hidden" name="op" value="consults" />
	<label for="search">Buscador: </label>
	<input type="search" id="search" class="change" name="q" placeholder="Escribe tu búsqueda" title="Tu Búsqueda" />
</div>
<input type="submit" id="send-search" class="change" name="send_btn" value="buscar" />
<?php 
    if($_GET["q"]!=null){
        $q=$_GET["q"];
        $query = "SELECT * FROM user WHERE MATCH(email,name_user,sex,phone,country) AGAINST('$q' IN BOOLEAN MODE)";
        include("resultsTable.php");
    }
?>