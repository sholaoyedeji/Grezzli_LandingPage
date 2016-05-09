<?php

$link = mysqli_connect("localhost", "grezzejn", "p5f7~1A4h4#c");
 
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
$first_name = mysqli_real_escape_string($link, $_POST['InputFName']);	
$last_name = mysqli_real_escape_string($link, $_POST['InputLName']);	
$email_address = mysqli_real_escape_string($link, $_POST['InputEmail']);	
$skills = mysqli_real_escape_string($link, $_POST['InputMessage']);

// Insert query execution
$sql = "INSERT INTO talent ( FirstName, LastName, Email, Skills) VALUES ('$first_name', '$last_name', '$email_address', '$skills')";

if(mysqli_query($link, $sql)){
    
    header('Location: welcome.html'); 
    //echo "Records added successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
 
