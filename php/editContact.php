<?php 
    //Assign to php variables the values that come from the form
    //Because the email field is disabled it does not recognize the value of the hidden field.
    $email = $_POST["email_hdn"];
    $nameContact = $_POST["nameUser_txt"];
    $sex = $_POST["sex_rdo"];
    $birth = $_POST["birth_txt"];
    $phone = $_POST["phone_txt"];
    $country = $_POST["country_slc"];

    include("connection.php");
    $query = "SELECT * FROM user WHERE email='$email'";
    $execute_query = $connectiondb->query($query);
    $number_register = $execute_query->num_rows;

    if($number_register==1){
        //If the photo comes empty we assign the value of the hidden button of the photo that has the previous value to the search, otherwise I upload the new photo and replace the value
        if(empty($_FILES["photo_fls"]["tmp_name"]))
        {
            $photo = $_POST["photo_hdn"];
        }
        else
        {
            //The function to upload the image is executed
            include("functions.php");
            $type = $_FILES["photo_fls"]["type"];
            $file = $_FILES["photo_fls"]["tmp_name"];
            $photo = uploadImage($type,$file,$email);
        }

        //I update the data to the database
        $query = "UPDATE user SET name_user='$nameContact', sex='$sex', birth='$birth', phone='$phone', country='$country', photo='$photo' WHERE email='$email'";
        $execute_query = $connectiondb->query(utf8_encode($query));

        if($execute_query){
            $message="Se han hecho los cambios en los datos del contacto con el email <b>$email</b> :)";
        }
        else{
            $message="No se pudieron hacer los cambios en los datos del contacto con el email <b>$email</b> :(";
        }
    }
    else{
        $message="No se pudieron hacer los cambios en los datos del contacto con el email <b>$email</b> por que no existe o esta duplicado :/";
    }

    $connectiondb->close();
    header("Location: ../index.php?op=change&message=$message");
?>