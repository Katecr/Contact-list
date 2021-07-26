<?php 

    /*The $extension parameter determines what type of image will not be deleted for example if it is jpg means that the image with extension .jpg stays on the server and if there are images with the same name but with extension png or gif will be deleted, with this function I avoid having duplicate images with different extensions for each profile the 
    //file_exists function evaluates if a file exists and */
    //the unlink function deletes a file from the server.

    function deleteImages($route,$extension)
    {
        switch($extension){
            case ".jpg":
                if(file_exists($route.".png"))
                    unlink($route.".png");
                if(file_exists($route.".gif"))
                    unlink($route.".gif");
                break;
            case ".gif":
                if(file_exists($route.".png"))
                    unlink($route.".png");
                if(file_exists($route.".jpg"))
                    unlink($route.".jpg");
                break;
            case ".png":
                if(file_exists($route.".jpg"))
                    unlink($route.".jpg");
                if(file_exists($route.".gif"))
                    unlink($route.".gif");
                break;
        }
    }

    //Function to upload the user's profile picture
    function uploadImage($type,$image,$email){
	//If the file type contains the word image it means that the file is an image.
	if(strstr($type,"image"))
	{
		//to find out what type of extension the image has
		if(strstr($type,"jpeg"))
			$extension = ".jpg";
		else if(strstr($type,"gif"))
			$extension = ".gif";
		else if(strstr($type,"png"))
			$extension = ".png";

		//to know if the image has the correct width, which is 420px.
		$imageSize = getimagesize($image);
		$widthImage = $imageSize[0];
		$heightImage = $imageSize[1];
		$imageWidthCorrect = 420;
		
		//If the image is larger in width than 420px, I resize it
		if($widthImage>$imageWidthCorrect)
		{
			//By a rule of 3 I get the height of the image proportional to the new width which will be 420
			$newImageWidth = $imageWidthCorrect;
			$newImageHeight = ($heightImage/$widthImage)*$newImageWidth;

			//I create a true color image with the new dimensions    
			$imageReset = imagecreatetruecolor($newImageWidth,$newImageHeight);

			//I create an image based on the original, depending on its extension is the type that I will create.
			switch($extension)
			{
				case ".jpg":
					$originalImage = imagecreatefromjpeg($image);
					//Rearrangement of the new image with respect to the original image
					imagecopyresampled($imageReset, $originalImage, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $widthImage, $heightImage);
					//I save the rescaled image on the server
					$nameImage_ext = "../img/photos/".$email.$extension;
					$nameImage = "../img/photos/".$email;
					imagejpeg($imageReset,$nameImage_ext,100);
					//I run the function to delete possible double images for the profile
                    deleteImages($nameImage,".jpg");
                    break;
                case ".gif":
					$originalImage = imagecreatefromgif($image);
					//Rearrangement of the new image with respect to the original image
					imagecopyresampled($imageReset, $originalImage, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $widthImage, $heightImage);
					//I save the rescaled image on the server
					$nameImage_ext = "../img/photos/".$email.$extension;
					$nameImage = "../img/photos/".$email;
					imagegif($imageReset,$nameImage_ext,100);
					//I run the function to delete possible double images for the profile
                    deleteImages($nameImage,".gif");
                    break;
                case ".png":
					$originalImage = imagecreatefrompng($image);
					//Rearrangement of the new image with respect to the original image
					imagecopyresampled($imageReset, $originalImage, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $widthImage, $heightImage);
					//I save the rescaled image on the server
					$nameImage_ext = "../img/photos/".$email.$extension;
					$nameImage = "../img/photos/".$email;
					imagepng($imageReset,$nameImage_ext);
					//I run the function to delete possible double images for the profile
                    deleteImages($nameImage,".png");
                    break;
			}
		}
		else
		{
			//I save the path that the image will have on the server
            $destination="../img/photos/".$email.$extension;

            //Photo uploaded
            move_uploaded_file($image,$destination) or die("No se pudo subir la imagen al Servidor :(");

            //I run the function to delete possible double images for the profile
            $nameImage = "../img/photos/".$email;
            deleteImages($nameImage,$extension);
		}

		//I assign the name of the photo to be saved in the DB as a text string
        $image=$email.$extension;
        return $image;
	}
	else
	{
		return false;
	}
}
?>