<br />
<div>
	<input type="hidden" name="op" value="consults" />
	<label for="country">País: </label>
	<select id="country" class="change" name="country_slc" required>
		<option value="">- - -</option>
		<?php include("selectCountry.php"); ?>
	</select>
</div>
<input type="submit" id="send-search" class="change" name="send_btn" value="buscar" />
<?php
if($_GET["country_slc"]!=null)
{
    $country=utf8_encode($_GET["country_slc"]);
    $query = "SELECT * FROM user WHERE country = '$country'";
    include("resultsTable.php");
}
?>