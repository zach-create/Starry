<?php include ('head.php');?>

<body>
    <div class="container">
        <div class="row">
		
		<center><h3>Automated Voting Sytem</h3></center>
            <div class="col-md-4 col-md-offset-4">
			
                <div class="login-panel panel panel-default">
				
                    <div class="panel-heading">
                        <center><h3 class="panel-title"> Log In</h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info" role="alert">
                            This login is only for registered voters.
                        </div>
                        <form role="form"  enctype = "multipart/form-data">
                            <fieldset>
							
                                <div class="form-group">
									<label for = "username" >ID No.</label>
										<input class="form-control" placeholder="Please Enter Voter's ID Number" name="idno" type="text" required = "required" autofocus>
                                </div>
								
                                <div class="form-group">
									<label for = "username" >Password</label>
										<input class="form-control" placeholder="Password" name="password" type="password" required = "required">
                                </div>
                             
                              
                                <button class="btn btn-lg btn-success btn-block " name = "login">Login</a>
								
								
                            </fieldset>
							
									
                        </form>
                        <h4><b>Note:</b> <i>Only registered voters can sign in, and each voter can vote only once.</i></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php include ('script.php');?>
  	<?php include ('footer.php');?>

</body>

</html>
