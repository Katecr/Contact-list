<br />
<div>
	<label for="m">Sexo: </label>
    <input type="hidden" name="op" value="consults" />
    <input type="radio" id="m" name="sex_rdo" title="Tu sexo" value="M" required />
    <label id="lm" for="m">Masculino</label>&nbsp;&nbsp;&nbsp;
    <input type="radio" id="f" name="sex_rdo" title="Tu sexo" value="F" required />
    <label id="lf" for="f">Femenino</label>
</div>
<input type="submit" id="send-search" class="change" name="enviar_btn" value="buscar" />
<?php
    if($_GET["sex_rdo"]!=null){
        $sex=$_GET["sex_rdo"];
        $query = "SELECT * FROM user WHERE sex = '$sex'";
        include("resultsTable.php");
    }
?>