<?php include ('head.php');?>
<?php include ('header.php');?>
<body>
<?php
	function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0];
				}
			return $gen;
		}

?>
    <div id="wrapper">

       <?php include ('side_bar.php');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Registration</h3>
                </div>
				<div class = "well col-lg-5">
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Please Enter the Detail Needed Below
                        </div>
                        <div class="panel-body">
                         <form method = "post" enctype = "multipart/form-data">
											<div class="form-group">
												<label>ID Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true">

											</div>

											<div class="form-group">
											<?php
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>
												<label>Password</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true" readonly="readonly" />
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div>

											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Lastname" required="true">
											</div>
											<div class="form-group">
												<label>AGE</label>
													<select class = "form-control" name = "age">
														<option></option>
														<option>18-25</option>
														<option>25-50</option>
														<option>50-60</option>
														<option>60-</option>
														

													</select>
											</div>

											<div class="form-group">
												<label>Occuption</label>
													<select class = "form-control" name = "year_level">
														<option></option>
														<option>Student</option>
														<option>Private Job</option>
														<option>Government Job</option>
														<option>Army</option>
														<option>Other</option>

													</select>
											</div>
											<div class="form-group">
												<label>Aadhar Card Number</label>
													<input class="form-control" type ="text" name = "adhar" placeholder="Aadhar Card Number" required="true">
											</div>
											<div class="form-group">
												<label>Phone Number</label>
													<input class="form-control" type ="text" name = "phno" placeholder="Phone number" required="true" onkeypress="phoneno()" maxlength="10">
											</div>

											 	 <button name = "save" type="submit" class="btn btn-primary">Save Data</button>

						  				 </div>


										</form>

							<?php
								require 'dbcon.php';

								if (isset($_POST['save'])){
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$agge=$_POST['age'];
									$id_number=$_POST['id_number'];
									$year_level=$_POST['year_level'];
									$password = $_POST['password'];
									$phhno=$_POST['phno'];
									
									$adhar=$_POST['adhar'];


									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();

									if ($count  > 0){
									?>
										<script>
											alert("ID Number Already Exist");
										</script>
									<?php
										}
										else {
										$conn->query("insert into voters(id_number, password, firstname,lastname,age,year_level,status,adhar,phno) VALUES('$id_number', '$password','$firstname','$lastname','$agge','$year_level','Unvoted','$adhar','$phhno')");
                    $conn->close();
								?>
									<script>
										alert('Voters Successfully Save');
									</script>
							<?php
									}
								}
							?>


						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ('script.php');?>
	<?php include ('footer.php');?>	
    <script>        
           function phoneno(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
	   
</body>

</html>
