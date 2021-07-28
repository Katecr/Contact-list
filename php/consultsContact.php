<form action="" id="consult-contact" name="consult_form" method="get">
    <fieldset>
		<legend>Consulta de contactos</legend>
		<label for="consult-list">Tipo de Consulta: </label>
		<select name="consult_slc" id="consult-list" required>
			<option value=""<?php if($_GET["consult_slc"]==""){ echo " selected"; } ?>>- - -</option>
			<option value="all"<?php if($_GET["consult_slc"]=="all"){ echo " selected"; } ?>>Todos</option>
			<option value="email"<?php if($_GET["consult_slc"]=="email"){ echo " selected"; } ?>>Por email</option>
			<option value="initial"<?php if($_GET["consult_slc"]=="initial"){ echo " selected"; } ?>>Por inicial</option>
			<option value="sex"<?php if($_GET["consult_slc"]=="sex"){ echo " selected"; } ?>>Por sexo</option>
			<option value="country"<?php if($_GET["consult_slc"]=="country"){ echo " selected"; } ?>>Por País</option>
			<option value="search"<?php if($_GET["consult_slc"]=="search"){ echo " selected"; } ?>>Tipo buscador</option>
		</select>
		<?php
			switch($_GET["consult_slc"])
			{
				case "all":
					include("php/consultAll.php");
					break;
				case "email":
					include("php/consultEmail.php");
					break;
				case "initial":
					include("php/consultInitial.php");
					break;
				case "sex":
					include("php/consultSex.php");
					break;
				case "country":
					include("php/consultCountry.php");
					break;
				case "search":
					include("php/consultSearch.php");
					break;
			} 
		?>
	</fieldset>
</form>
<script>
	window.onload = function()
	{
		var list = document.getElementById("consult-list");

		list.onchange = function()
		{
			window.location="?op=consults&consult_slc="+list.value;
		};
	}
</script>