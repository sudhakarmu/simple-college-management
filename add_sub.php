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
					
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sub(SNAME) values ('{$_POST["sname"]}')";
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
		<label>Subject Name</label>
		</div>
		<div class="col-lg-6">
		<input type="text" name="sname" required class="input">
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
                            <h6 class="m-0 font-weight-bold text-primary">Subject&emsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Subject
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
							<th>Subject Name</th>
							<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
										<th>S.No</th>
							<th>Subject Name</th>
							<th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
							$s="select * from sub";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
										<td>{$i}</td>
										<td>{$r["SNAME"]}</td>
										<td><a href='sub_delete.php?id={$r["SID"]}' class='btnr'>Delete</a></td>
										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
							}
						?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    

			</div>
<?php

include('includes/scripts.php');
include('includes/footer.php');

?>