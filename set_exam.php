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
					
						<h3 >Set Exam Time Table Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
							
							$sq="insert into exam(ENAME,ETYPE,EDATE,SESSION,CLASS,SUB) values ('{$_POST["ename"]}','{$_POST["etype"]}','{$edate}','{$_POST["ses"]}','{$_POST["cla"]}','{$_POST["sub"]}')";
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
			
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
							<label> Exam Name</label>
							</div>
							<div class="col-lg-4">
							<input type="text" class="input3 form-control" name="ename">
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-lg-3">
							<label> Select SEM</label>
							</div>
							<div class="col-lg-4">
							<select name="etype" required class="input3 form-control">
						       <option value="">Select</option>
						       <option value="SEM 1">SEM 1</option>
						       <option value="SEM 2">SEM 2</option>
							   <option value="SEM 3">SEM 3</option>
						       <option value="SEM 4">SEM 4</option>
						       <option value="SEM 5">SEM 5</option>
						       <option value="SEM 6">SEM 6</option>
							</select>
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-lg-3">
							<label> Exam Date</label>
							</div>
							<div class="col-lg-1">
							<select name="da" class="input5 form-control">
						<option value="">Date</option>
						<option value="1">1 </option>
						<option value="2">2 </option>
						<option value="3">3 </option>
						<option value="4">4 </option>
						<option value="5">5 </option>
						<option value="6">6 </option>
						<option value="7">7 </option>
						<option value="8">8 </option>
						<option value="9">9 </option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					
							</div>
							<div class="col-lg-1">
							<select name="mo" class="input5 form-control">
						<option> Month</option>
						<option value="01">Jan</option>
						<option value="02">Feb</option>
						<option value="03">Mar</option>
						<option value="04">Apr</option>
						<option value="05">May</option>
						<option value="06">Jun</option>
						<option value="07">Jul</option>
						<option value="08">Aug</option>
						<option value="09">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
							</div>
							<div class="col-lg-2">
							<select name="ye" class="input5 form-control">
						<option value="">Select Year</option>
						<option value="2021">2021</option>
						<option value="2020">2020</option>
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
					</select>
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-lg-3">
							<label>Session</label>

							</div>
							<div class="col-lg-4">
							<select name="ses" required class="input3 form-control">
							<option value="">Select</option>
							<option value="FN">FN</option>
							<option value="AN">AN</option>
						</select>
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-lg-3">
							<label>Class</label>

							</div>
							<div class="col-lg-4">
			
							<select name="cla" required class="input3 form-control">
						<?php
							$sl="select DISTINCT(CNAME) from class";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Select</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
								}
								
							}
						?>	
						
					</select>
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-lg-3">
							<label>Subject</label><br>

							</div>
							<div class="col-lg-4">
							<select name="sub" required class="input3 form-control">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>select</option>";
								while($r=$re->fetch_assoc())
								{
									echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						?>
						
					</select>
							</div>
						</div><br><br>
						<div class="row">
						<button type="submit" class="btn btn-success" name="submit">Add Exam Details</button>

						</div><br><br>
					</div>
		
				

				</form>
				
				
				</div>
				
				
			</div>
						</div>


<?php

include('includes/scripts.php');
include('includes/footer.php'); 

?>