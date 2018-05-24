<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?><?php
	session_start();
	ob_start();
?>
<?php
$con = mysqli_connect("localhost", "connarts_ossai", "ossai'spassword", "connarts_nysc");

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(!empty($_FILES['pictureselect']) ){
	
	foreach ($_FILES['pictureselect']['error'] as $key => $error) {
		# code...
		mysqli_query($con,"INSERT INTO ads(name, email) VALUES ('$name', 'did1')");
		if ($error == UPLOAD_ERR_OK) {
			# code...
			$extension = pathinfo($_FILES['pictureselect']['name'][$key], PATHINFO_EXTENSION);
	
			if(!in_array(strtolower($extension), $allowed)){
				#echo '{"status":"error"}';
				http_response_code(406); //"not acceptable" error
				continue;
			}
	
			$tmp_name = $_FILES['pictureselect']['error'][$key];
			$name = basename($_FILES['pictureselect']['name'][$key]);
			$moved_ = move_uploaded_file($tmp_name, 'C:\\xampp\\htdocs\\ajuwaya\\uploads\\'.$name);
			if ($moved_) {
				# code...
				$q = mysqli_query($con,"INSERT INTO ads(name, email) VALUES ('$name', 'john@e--xamp.com')");
				if ($q) {
					# code...
					http_response_code(200); //'yea yea, ok'
					
				} else {
					# code...
					http_response_code(304); //"not modified" error
					
				}
			}
		}
	}

}

#echo '{"status":"error"}';
http_response_code(304); //"not modified" error
exit;

?>
