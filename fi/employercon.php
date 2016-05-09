
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
//$radio = mysqli_real_escape_string($link, $_POST['radio']);
$email_address = mysqli_real_escape_string($link, $_POST['email']);	
$company = mysqli_real_escape_string($link, $_POST['Company']);
$phone = mysqli_real_escape_string($link, $_POST['tel']);
$info= mysqli_real_escape_string($link, $_POST['otherinfo']);

$radio ="Company";
// Insert query execution
$sql = "INSERT INTO employers ( Employertype, Email, Company, Phone, Otherinfo) VALUES ('$radio', '$email_address', '$company', '$phone', '$info')";
if(mysqli_query($link, $sql)){
    header('Location: welcome.html'); 
    // echo "Records added successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
 

