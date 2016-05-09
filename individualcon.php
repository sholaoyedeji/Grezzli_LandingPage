<?php

$link = mysqli_connect("localhost", "", "");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Choose database
$db_select = mysqli_select_db($link, grezzejn_startup);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}


// Escape user inputs for security
//$radio = mysqli_real_escape_string($link, $_POST['radio']);
$first_name = mysqli_real_escape_string($link, $_POST['InputFName']);	
$last_name = mysqli_real_escape_string($link, $_POST['InputLName']);	
$email_address = mysqli_real_escape_string($link, $_POST['InputEmail']);	
$skills = mysqli_real_escape_string($link, $_POST['InputMessage']);

$radio ="Individual";
// Insert query execution
$sql = "INSERT INTO employers (Employertype, FirstName, LastName, Email, Service) VALUES ('$radio', '$first_name', '$last_name', '$email_address', '$skills')";

//send email
$to = $_POST['InputEmail'];
	$subject = "Welcome to Grezzli";
// Get HTML contents from file
	$htmlContent = file_get_contents("email_template.html");

// Set content-type for sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
	$headers .= 'From: Grezzli<contact@grezzli.com>' . "\r\n";
	//$headers .= 'Cc: contact@grezzli.com' . "\r\n";
	mail($to,$subject,$htmlContent,$headers);


if(mysqli_query($link, $sql)){
    header('Location: welcome.html'); 
    //echo "Records added successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
 

