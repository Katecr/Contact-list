<form id="low-contact" name="low_frm" action="php/deleteContact.php"  method="post">
    <fieldset>
		<legend>Eliminar Contacto</legend>
		<div>
			<label for="email">Email: </label>
			<select id="email" class="change" name="email_slc" required>
				<option value="">- - -</option>
				<?php include("selectEmail.php"); ?>
			</select>
		</div>
		<div>
			<input type="submit" id="send-Deleted" class="change" name="send_btn" value="eliminar" />
		</div>
		<?php include("php/messages.php"); ?>
	</fieldset>
</form>