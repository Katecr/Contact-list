<script>
	window.onload = function()
	{
		var list = document.getElementById("contact-list");
		list.onchange = selectContact;

		function selectContact()
		{
			window.location="?op=change&contact_slc="+list.value
		}
	}
</script>

<form id="change-contact" name="change_frm" action="php/editContact.php" method="post" enctype="multipart/form-data">
    <fieldset>
		<legend>Modificación de contacto</legend>
		<div>
			<label for="contact-list">Contacto: </label>
			<select id="contact-list" class="change" name="contact_slc" required>
				<option value="">- - -</option>
				<?php include("selectEmail.php"); ?>
			</select>
		</div>
		<?php 
			if($_GET["contact_slc"]!=null)
			{
				$connection2=connectDB();
				$contact = $_GET["contact_slc"];
				$contact_query ="SELECT * FROM user WHERE email='$contact'";
				$execute_contact_query = $connection2->query($contact_query);
				$register_contact = $execute_contact_query->fetch_assoc();
				include("php/changeForm.php");
			}
			include("php/messages.php");
		?>
	</fieldset>
</form>