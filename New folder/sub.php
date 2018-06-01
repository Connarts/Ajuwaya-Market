<?php

if (isset($_FILES['pictureselect'])){
$check = getimagesize($_FILES["pictureselect"]["tmp_name"]);
    
     $imageName=$_FILES['pictureselect']['name'];
                $tmp_name=$_FILES['pictureselect']['tmp_name'];
                $local_image="image/";
                $uploadOk = 1;
                $imageFileType = pathinfo($local_image,PATHINFO_EXTENSION);
                $upload=move_uploaded_file($tmp_name, $local_image.$imageName);
     
                    echo  "Successful";
          }
    else{
                echo "image not seen";
            }

  