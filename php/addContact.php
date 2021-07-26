<?php 
    //assign form data to variables
    $email = $_POST["email_txt"];
    $nameContact = $_POST["nameUser_txt"];
    $sex = $_POST["sexo_rdo"];
    $birth = $_POST["birth_txt"];
    $phone = $_POST["phone_txt"];
    $country = $_POST["country_slc"];

    //depending on the sex we put a predetermined image
    $image_generic = ($sex=="M")?"img/photos/man.png":"img/photos/woman.png";

    //we verify that the user's email does not already exist in the DB
    include("connection.php");
    $query = "SELECT * FROM user WHERE email='$email'";
    $execute_query = $connectiondb->query($query);
    $num_regs = $execute_query->num_rows;

    //If $num_regs is equal to 0, we insert the data in the table, otherwise we send a message that the user exists.
    if($num_regs == 0)
    {
        //The function to upload the image is executed
        include("functions.php");
        $type = $_FILES["photo_fls"]["type"];
        $file = $_FILES["photo_fls"]["tmp_name"];
        $imageUploaded = uploadImage($type,$file,$email);

        //If the photo in the form is empty, then I assign the value of the generic image, otherwise the name of the uploaded photo.
        $image = empty($file)?$image_generic:$imageUploaded;

        $query = "INSERT INTO user (email,name_user,sex,birth,phone,country,photo) VALUES ('$email','$nameContact','$sex','$birth','$phone','$country','$image')";
        $executeQuery = $connectiondb->query(utf8_encode($query));

        if($executeQuery)
            $message = "Se ha agregado el contacto con el email <b>$email</b> :)";
        else
            $message = "No se pudo agregar al contacto con el email <b>$email</b> :(";
    }
    else
    {
        $message = "No se pudo agregar el contacto con el email <b>$email</b> por que ya existe :/";
    }

    $connectiondb->close();
    header("Location: ../index.php?op=high&message=$message");

?>