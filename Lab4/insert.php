<?php
	require_once 'connection.php';

	if(isset($_POST['register']))
	// Escape user inputs for security
		$id = $mysqli->real_escape_string($_REQUEST['id']);
		$name = $mysqli->real_escape_string($_REQUEST['name']);
		$email = $mysqli->real_escape_string($_REQUEST['email']);
		$number = $mysqli->real_escape_string($_REQUEST['number']);
		$address = $mysqli->real_escape_string($_REQUEST['address']);
		$course = $mysqli->real_escape_string($_REQUEST['course']);
		$points = $mysqli->real_escape_string($_REQUEST['points']);

	// attempt insert query execution
	$sql = "INSERT INTO students (id, name, email, number, address, course, points) VALUES ('$id', '$name', '$email', '$number', '$address', '$course', '$points')";

	if($mysqli->query($sql) === true){
		echo "<script language='javascript'>
				alert ('Student has been registered.');
				window.location='client.php'
			</script>";
	} 
	else{
		echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
	}

	// Close connection
	$mysqli->close();

?>