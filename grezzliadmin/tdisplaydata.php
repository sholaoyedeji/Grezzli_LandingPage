<?php 
include("dbconfig.php");
session_start();
if(!isset($_SESSION['login_user']))
	{
	header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
		<title>Grezzli Admin Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">
    

</head>

<body>


    <?php
	
	if(isset($_SESSION['login_user']))
	{
	$login_session=$_SESSION['login_user'];
        }
	?>
	
     <!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<p class="brand"><b><i><font color="white">Talent Data</font></i></b></p>
                	<a class="brand" href="edisplaydata.php"><b>View Service Seekers Data</b></a>
                <a class="brand" href="logout.php">Logout</a>
                
				
			</div>
		</div>
	</div>

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
			
			</div>
			<div class="span3 hidden-phone"></div>

			
		</div>
		<form action="talent.php" method="post" name="export_excel">

			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export Data to CSV/Excel File</button>
				</div>
			</div>
		</form>	

		<table class="table table-bordered">
			<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>First_Name</th>
				  		<th>Last_Name</th>
				  		<th>Email</th>
				  		<th>Skills</th>
				 		
				 
				  	</tr>	
				  </thead>
			<?php
				$SQLSELECT = "SELECT * FROM talent ";
				$result_set =  mysqli_query($dbconfig, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['FirstName']; ?></td>
						<td><?php echo $row['LastName']; ?></td>
						<td><?php echo $row['Email']; ?></td>
						<td><?php echo $row['Skills']; ?></td>
					

					</tr>
				<?php
				}
			?>
		</table>
	</div>

	</div>   
        
</body>

</html>