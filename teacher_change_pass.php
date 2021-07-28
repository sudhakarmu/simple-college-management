<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_home.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}
		include('include/header.php');
		include('include/navbar.php');
?>
<div class="container-fluid">

			<div id="section">
				<div class="content">
				
					<h3>Change Password</h3><br>
			
					 
				
					<div class="lbox1">	
							<?php
						if(isset($_POST["submit"]))
						{
							$sql="select * from staff where TPASS='{$_POST["opass"]}' and TID='{$_SESSION["TID"]}'";
							$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$sql="UPDATE staff SET  TPASS='{$_POST["npass"]}' where  TID='{$_SESSION["TID"]}'";
										$db->query($sql);
										echo"<div class='success'>password Changed</div>";
									}
									else
									{
										echo"<div class='error'>password Mismatch</div>";
									}
								}
								else
								{
									echo"<div class='error'>Invalid password</div>";
								}
						}
					
					
					
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Old Password</label><br>
						<div class="col-lg-3">
						<input type="text" class="input3 form-control" name="opass"><br><br>

						</div>
						<label>New Password</label><br>
						<div class="col-lg-3">
						<input type="text" class="input3 form-control" name="npass"><br><br>

						</div>
						<label>Confirm Password</label><br>
						<div class="col-lg-3">
						<input type="text" class="input3 form-control" name="cpass"><br><br>

						</div>
						<button type="submit" class="btn btn-success" style="float:left" name="submit"> Change Password</button>
				
					</form>
			
					</div>
			
					
				</div>
			</div>
</div>
<?php

include('include/scripts.php');
include('include/footer.php');

?>