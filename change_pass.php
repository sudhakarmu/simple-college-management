<?php
	include"database.php";
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
					
						<h3 > Change Password</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sql="select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
								$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$s="update admin SET APASS='{$_POST["npass"]}' where AID='{$_SESSION["AID"]}'";
										$db->query($s);
										echo "<div class='success'>Password Changed</div>";
									}
									else
									{
										echo "<div class='error'>Password Mismatch</div>";
									}
								}
								else
								{
									echo "<div class='error'>Invalid Password</div>";
								}
							}
						
						
						?>
						
							
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="container">
							<div class="row">
								<div class="col-lg-3">
								<label>Old Password</label><br>

								</div>
								<div class="col-lg-4">
														<input type="text" class="input3 form-control" name="opass"><br><br>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
								<label>New Password</label><br>

								</div>
								<div class="col-lg-4">
								<input type="text" class="input3 form-control" name="npass"><br><br>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
								<label>Confirm Password</label><br>

								</div>
								<div class="col-lg-4">
								<input type="text" class="input3 form-control" name="cpass"><br><br>

								</div>
							</div>
							<div class="row">
							<button type="submit" class="btn btn-success" style="float:left" name="submit"> Change Password</button>

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