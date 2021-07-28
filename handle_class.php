<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	include('include/header.php');
	include('include/navbar.php');
?>
<div class="container-fluid">

			
					
<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into hclass(TID,CLA,SEC,SUB) values ('{$_SESSION["TID"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
		
						}

?>
	


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

<div class="modal-body">
<div class="row">
<div class="col-lg-3">
<label>Class Name</label>
</div>
<div class="col-lg-6">
<select name="cla" required class="input3">
							<?php
								$sl="select DISTINCT(CNAME) from class";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
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
<div class="col-lg-6">
<select name="sec" required class="input3">
						<?php
							$sl="select DISTINCT(CSEC) from class";
							$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo "<option value=''>Select</option>";
									while($ro=$r->fetch_assoc())
									{
										echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
									}
								}
						
						
						
						
						?>
						
						
						</select>
</div>
</div>
<div class="row">
<div class="col-lg-3">
<label>Subject</label><br>

</div>
<div class="col-lg-6">
<select name="sub" required class="input3">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						
						
						?>
						</select>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
</div>
</form>
</div>
</div>
</div>
				<!-- DataTales Example -->
				<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Classes&emsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Add Class
</button></h6>
	</div>
	<div class="card-body">
	<?php
	if(isset($_GET["mes"]))
	{
		echo"<div class='error'>{$_GET["mes"]}</div>";	
	}

?>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
					<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Subject</th>
							<th>Delete</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
					<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Subject</th>
							<th>Delete</th>	
					</tr>
				</tfoot>
				<tbody>
				<?php
							$s="select * from hclass";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["CLA"]}</td>
										<td>{$r["SEC"]}</td>
										<td>{$r["SUB"]}</td>
										<td><a href='hclass.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
									</tr>
									
									";
								}
							}
						
						
						
						?>
				</tbody>
			</table>
		</div>
	</div>


</div>
	</div>






			<div id="section">
				
					
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into hclass(TID,CLA,SEC,SUB) values ('{$_SESSION["TID"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
							if($db->query($sq))
							{
								echo "<div class=''>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
		
						}
					
					
					?>					
						
						
		

					
					
					</div>

	
<?php

include('include/scripts.php');
include('include/footer.php');

?>