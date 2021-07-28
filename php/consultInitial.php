<br /><br />
<?php 
//Se crea un array con el abcdario
$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');

//Con un for se muestra en pantalla todo el abcdario
//Se construye un enlace dinámico por cada letra del abcdario
for($i=0; $i<count($letter);$i++)
{
	if($letter[$i]=="Z")
	{
		echo "<a class='change' href='?op=consults&consult_slc=initial&letter=".$letter[$i]."'>".$letter[$i]."</a>";
	}
	else
	{
		echo "<a class='change' href='?op=consults&consult_slc=initial&letter=".$letter[$i]."'>".$letter[$i]."</a>\n-\n";
	}
}

if($_GET["letter"]!=null)
{
	$initial = $_GET["letter"];
	$query = "SELECT * FROM user WHERE name_user LIKE '$initial%';";
	include("resultsTable.php");
}
?>