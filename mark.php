<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["rno"]))
	{
		$sql="select * from student where RNO='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class=$rows["SCLASS"];
			$regno=$_GET["rno"];
		}
	}
	include('include/header.php');
	include('include/navbar.php');
?>
<div class="container-fluid">

			<div id="section">
				<div class="content">
					
					<h3>Add Marks</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into mark(REGNO,SUB,MARK,TERM,CLASS) values ('{$_POST["regno"]}','{$_POST["sub"]}','{$_POST["mark"]}','{$_POST["etype"]}','{$_POST["class"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}
					
					
					
					?>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Register No</label><br>
							<div class="col-lg-3">
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input3 form-control" name="regno" readonly><br><br>

							</div>
							
							<label>Class</label><br>
							<div class="col-lg-3">
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $class ?>" class="input3 form-control" name="class" readonly><br><br>

							</div>
						
							<label> Select Term</label><br>
							<div class="col-lg-3">
							<select name="etype" required class="input3 form-control">
								<option value="">Select</option>
								<option value="SEMESTER 1">SEMESTER 1</option>
								<option value="SEMESTER 2">SEMESTER 2</option>
								<option value="SEMESTER 3">SEMESTER 3</option>
								<option value="SEMESTER 4">SEMESTER 4</option>
								<option value="SEMESTER 5">SEMESTER 5</option>
								<option value="SEMESTER 6">SEMESTER 6</option>
							</select>
							</div>

							<br><br>
						</div>
						<div class="rbox">
							
						<label>Subject</label><br>
						<div class="col-lg-3">
						<select name="sub" required class="input3 form-control">
						
								<?php 
									 $s="SELECT *  FROM sub";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
						
						</div>
							
							<br><br>
							<label >Mark :</label><br>
							<div class="col-lg-3">
							<input class="input3 form-control" name="mark"  id="mark" type="mark" required>

							</div>
							<br><br>
							<button type="submit" style="float:right;" class="btn btn-success" name="submit"> Add Mark Details</button>
					</form>							
						</div>
						
				</div>
				
			</div>
			</div>
<?php

include('include/scripts.php');
include('include/footer.php');

?>