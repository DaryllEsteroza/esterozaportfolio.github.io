<?php
	session_start();
   
	unset($_SESSION['id']);
	echo "<script>location.href='signin.php'</script>";
?>