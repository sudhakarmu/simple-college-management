<?php
	include('database.php');
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	

	include('includes/header.php');
	include('includes/navbar.php');
?>
<div class="container-fluid">

			<div id="section">
				
				
				<div class="content1">
					
						<h3 > Add Staff Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$sqs="insert into staff(`TNAME`,`TPASS`,`QUAL`,`SAL`) values('{$_POST["sname"]}','1234','{$_POST["qual"]}','{$_POST["sal"]}')";
							if($db->query($sqs))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
							
						}
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
							<label>Staff Name</label><br>

							</div>
							<div class="col-lg-4">
							<input type="text" name="sname" required class="input form-control">

							</div>
						</div>					     <br><br>

						<div class="row">
							<div class="col-lg-3">
							<label>Qualification</label><br>

							</div>
							<div class="col-lg-4">
							<input type="text" name="qual" required class="input form-control">

							</div>
						</div>					     <br><br>

						<div class="row">
							<div class="col-lg-3">
							<label>Salary</label><br>

							</div>
							<div class="col-lg-4">
							<input type="text" name="sal" required class="input form-control">

							</div>
						</div>					     <br><br>

						<div class="row">
						<button type="submit" class="btn btn-success" name="submit">Add Staff Details</button>
						</div>
					</div>
					 
					</form>
				
				
				</div>
				
					</div>
			</div>
<?php

include('includes/scripts.php');
include('includes/footer.php');

?>