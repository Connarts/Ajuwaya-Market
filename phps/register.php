<?php
	session_start();
	ob_start();
?>
<?php
$con = mysqli_connect("localhost", "connarts_ossai", "ossai'spassword", "connarts_nysc");

$_SESSION['email'] = $_POST['email'];

if (mysqli_query(
    $con, "INSERT INTO details (password, email)
    VALUES ('".$_POST['password']."', '".$_POST['email']."') "
    )	) {
    if ( mysqli_affected_rows($con) == 1	) {
      http_response_code(200);
    }	else {
      http_response_code(300);
    }
  } else {
    http_response_code(304);
  }
?>