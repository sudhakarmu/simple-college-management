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
			
				<div class="content">
				<h3 >View Student Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="container">	
						<div class="row">
							<div class="col-lg-3">
							<label>Class</label><br>

							</div>
							<div class="col-lg-4">
							<select name="cla" required class="input3 form-control">
				
				<?php 
					 $sl="SELECT DISTINCT(CNAME) FROM class";
					$r=$db->query($sl);
						if($r->num_rows>0)
							{
								echo"<option value=''>Select</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
								}
							}
				?>
			
			</select>
							</div>
						</div><br>	
						<div class="row">
							<div class="col-lg-3">
							<label>Section</label><br>

							</div>
							<div class="col-lg-4">
							<select name="sec" required class="input3 form-control">
				
				<?php 
					 $sql="SELECT DISTINCT(CSEC) FROM class";
					$re=$db->query($sql);
						if($re->num_rows>0)
							{
								echo"<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
									echo "<option value='{$r["CSEC"]}'>{$r["CSEC"]}</option>";
								}
							}
				?>
			
			</select>
							</div>
						
						</div>
					<br>
						<div class="row">
						<button type="submit" class="btn btn-info" name="view"> View Details</button>

						</div>
			
				
						
					</form>
						</div>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Student Details</h3><br>";
								$sql="select * from student where SCLASS='{$_POST["cla"]}' and SSEC='{$_POST["sec"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Roll No</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>DOB</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Mail</th>
											<th>Address</th>
											<th>Class</th>
											<th>Sec</th>
											<th>Image</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["RNO"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["FNAME"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td>{$r["SCLASS"]}</td>
											<td>{$r["SSEC"]}</td>
											<td><img src='{$r["SIMG"]}' height='70' width='70'></td>
										
										
										</tr>
										";
										
									}
								}
							else
							{
								echo "No record Found";
							}
								echo "</table>";
							}
						
						
						?>
					<br><br>	
					</div>
				</div>
				
				
			</div>
<?php

include('includes/scripts.php');
include('includes/footer.php');

?>