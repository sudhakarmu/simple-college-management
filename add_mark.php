<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
				
					<h3>Add Marks</h3><br>
					
					 <?php
						if(isset($_GET["err"]))
						{
							echo "<div class='error'>{$_GET["err"]}</div>";
						}
					?>
					<form  method="get" action="mark.php">
					<div class="lbox1">	
					
						<label>Enter Roll No</label><br>
						<div class="col-lg-3">
						<input type="text" class="input3 form-control" name="rno">
						</div><br><br>
					</select>
					
					</div>
			
					<button type="submit" class="btn btn-success" name="view"> View Details</button>
				
					</form>
			
				</div>
			</div>
			</div>
<?php

include('include/scripts.php');
include('include/footer.php');

?>