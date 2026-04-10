<?php include ('session.php');?>
<?php include ('head.php');?>

<body>
    <div id="wrapper">

        <!-- Navigation -->
		<?php include ('header.php');?>
        <?php //include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Voters List</h3>

                </div>
				<?php
					$count = $conn->query("SELECT COUNT(*) as total FROM `voters`")->fetch_array();
					$count1 =  $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE `status` = 'Voted'")->fetch_array();
					$count2 = $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE `status` = 'Unvoted'")->fetch_array();
					?>
				<a href="voters.php" class = "btn btn-primary btn-outline" style="background : none !important; color:#3071a9 !important;"><i class = "fa fa-paw"></i> ALL Voters (<?php echo $count['total']?>)</a>
				<a href="voted.php" class = "btn btn-success btn-outline" style="background : none !important; color:#58FF33 "><i class = "fa fa-paw"></i> Voted(<?php echo $count1['total']?>)</a>
				<a href="unvoted.php" class = "btn btn-danger btn-outline" style="background : none !important; color:#F91D03"><i class = "fa fa-paw"></i> Unvoted(<?php echo $count2['total']?>) </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<a  href = "updated.php"class = "btn btn-danger btn-outline pull-right" name = "go" style="background : none !important; color:#F91D03"><i class = "fa fa-spinner fa-spin"></i> De-Activate All  Accounts</a>
        <a  href = "update_status.php"class = "btn btn-success btn-outline pull-right" style = "margin-right:12px;background : none !important; color:#58FF33 " name = "go"><i class = "fa fa-asterisk fa-spin"></i> Activate All Accounts</a>
				<a  href = "generate_password.php"class = "btn btn-primary btn-outline pull-right" name = "go" style="background : none !important; color:#3071a9"><i class = "fa fa-spinner fa-spin"></i> Generate  Voters Password</a>

        <br />
				<br />
				<a href="download.php" class="btn btn-success btn-outline" style="background : none !important; color:#58FF33 "><i class="glyphicon glyphicon-save" ></i> Import Data (csv exel file)</a>
                <a href="../register/index.php" class = "btn btn-primary btn-outline" style="background : none !important; color:#3071a9 !important;"><i class = "fa fa-paw"></i> Add Voters</a>


				<hr/>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">
												<div class="panel panel-primary">
													<div class="panel-heading"><i class = "fa fa-users"></i>
														Voters List
													</div>
												</div>
											</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>ID Number</th>
                                            <th>Password</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Occuption</th>
                                            <th>Status</th>
                                            <th>Phone Number</th>
                                            <th>Aadhar Card </th>
                                            <th>Account</th>

                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											require 'dbcon.php';

											$query = $conn->query("SELECT * FROM voters ORDER BY voters_id DESC");
											while($row1 = $query->fetch_array()){
											$voters_id=$row1['voters_id'];
										?>

											<tr>
												<td><?php echo $row1 ['id_number'];?></td>
												<td><?php echo $row1 ['password'];?></td>
												<td><?php echo $row1 ['firstname']." ". $row1 ['lastname'];?></td>
                        	<td><?php echo $row1 ['age'];?></td>
												<td><?php echo $row1 ['year_level'];?></td>
												<td><?php echo $row1 ['status'];?></td>
                        <td><?php echo $row1 ['phno'];?></td>
                        <td><?php echo $row1 ['adhar'];?></td>
												<td><?php echo $row1 ['account'];?></td>

											</tr>

                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <?php include ('script.php');?>
		<?php //include ('footer.php');?>

</body>

</html>
