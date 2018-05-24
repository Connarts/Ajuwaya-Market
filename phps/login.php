<?php
$con = mysqli_connect("localhost", "connarts_ossai", "ossai'spassword", "connarts_nysc");

if (mysqli_query(
    $con, "SELECT username FROM details WHERE username = 
    '".$_POST['username']."' AND password = '".$_POST['password']."' "
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