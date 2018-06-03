<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if {isset($_FILES['image'])}
    $imageid=$userid;
    function cleanstring($string){ 
        return preg_replace('/[^A-Za-z0-9]/'',$string');
        
    }
    $imageid = cleanstring($imageid);
    $imageName=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $ext= pathinfo($imageName,PATHINFO_EXTENSION);
    $imageid=$imageid.",".$ext;
    $local_image="image/";
    $upload=move_uploaded_file($tmp_name, $local_image.$imageName);
    $imageName=rename($local_image,$imageName,$local_image.$imageid)
    
?>



