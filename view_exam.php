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
				
					
					
	
			




			      <!-- DataTales Example -->
				  <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View Exam Time Table Details</h6>
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
								<th>Class </th>
								<th>Subject</th>
								<th>Exam Name</th>
								<th>Term</th>
								<th>Date</th>
								<th>Session</th>
								<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
										<th>S.No</th>
								<th>Class </th>
								<th>Subject</th>
								<th>Exam Name</th>
								<th>Term</th>
								<th>Date</th>
								<th>Session</th>
								<th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
								$s="select * from exam";
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
												<td>{$r["CLASS"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["ENAME"]}</td>
												<td>{$r["ETYPE"]}</td>
												<td>{$r["EDATE"]}</td>
												<td>{$r["SESSION"]}</td>
												<td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Delete</a></td>
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
							</div>
<?php

include('includes/scripts.php');
include('includes/footer.php');

?>