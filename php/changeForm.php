<div>
    <label for="email">Email: </label>
    <input type="email" id="email" class="change" name="email_txt" placeholder="Escribe tu email" title="Tu email" value="<?php echo $register_contact['email'];?>" disabled required />
    <input type="hidden" name="email_hdn" value="<?php echo $register_contact['email'];?>">
</div>
<div>
    <label for="nameUser">Nombre: </label>
    <input type="text" id="nameUser" class="change" name="nameUser_txt" placeholder="Escribe tu nombre" title="Tu nombre" value="<?php echo $register_contact['name_user']?>" required />
</div>
<div>
    <label for="m">Sexo: </label>
    <input type="radio" id="m" name="sex_rdo" title="Tu sexo" value="M" <?php if($register_contact["sex"]=="M"){echo "checked"; }?> required />&nbsp;<label for="m">Masculino</label>
    &nbsp;&nbsp;&nbsp;
    <input type="radio" id="f" name="sex_rdo" title="Tu sexo" value="F" <?php if($register_contact["sex"]=="F"){echo "checked"; }?> required />&nbsp;<label for="f">Femenino</label>
</div>
<div>
    <label for="birth">Fecha de nacimiento: </label>
    <input type="date" id="birth" class="change" name="birth_txt" title="Tu cumple" value="<?php echo $register_contact['birth'];?>" required />
</div>
<div>
    <label for="phone">Telefono: </label>
    <input type="number" id="phone" class="change" name="phone_txt" placeholder="Escribe tu teléfono" title="Tu teléfono" value="<?php echo $register_contact['phone'];?>" required />
</div>
<div>
    <label for="country">Pais: </label>
    <select id="country" class="change" name="country_slc" required>
        <option value="">- - -</option>
        <?php include("selectCountry.php"); ?>
    </select>
</div>
<div>
    <label for="photo">Foto: </label>
    <div class="attach-file change">
        <input type="file" id="photo" name="photo_fls" title="Sube tu foto" />
        <input type="hidden" name="photo_hdn" value="<?php echo $register_contact['photo'];?>">
    </div>
    <div>
        <img src="<?php echo "img/photos/".$register_contact["photo"]; ?>" alt="" srcset="">
    </div>
</div>
<div>
    <input type="submit" id="send-high" class="change" name="send_btn" value="modificar"/>
</div>