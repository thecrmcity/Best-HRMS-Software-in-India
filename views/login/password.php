
<?php
$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/inc/login-head.php';
?>
	<div class="weblogin">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="sidestrip">
						<img src="../../assets/dist/img/inolgo.png">
						<p>World's Leading Provider of Cloud Business Management Software NetSuite lionizes <span class="font-weight-bold"> inoday India's #1 NetSuite Solution Provider</span></p>
						<a href="https://inoday.com/contactus/" class="btn btn-primary" target="_blank"><i class="fas fa-envelope"></i> Contact Us</a>
					</div>
				</div>
				
				<div class="col-lg-7 col-md-7">
					<?php
						if(isset($_GET['id']))
						{
							$id = $_GET['id'];
						}
						else
						{
							header('Location:index.php');
						}
					?>
					<div class="row">
						<div class="col-lg-4 col-md-4"></div>
						<div class="col-lg-8 col-md-8">
					<div class="innerlog">
						<h2>Welcome to Employee Management System</h2>
						<form class="" method="POST" action="../../functions/login.php?case=password&id=<?php echo $id;?>">
						<div class="card">
							<div class="card-header bg-light">
								<h3 class="card-title">Generate Password</h3>
							</div>
							
							<div class="card-body">
								<div class="form-group row">
									<label class="col-lg-4 col-form-label">Password*</label>
									<div class="input-group col-lg-8">
										
										<div class="input-group-prepend">
											<div class="input-group-text rounded-0"><i class="fa fa-lock"></i></div>
											
										</div>
										<input type="password" name="userpass" class="form-control rounded-0" placeholder="Password" autocomplete="off" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-4 col-form-label">Confirm*</label>
									<div class="input-group col-lg-8">
										
										<div class="input-group-prepend">
											<div class="input-group-text rounded-0"><i class="fa fa-lock"></i></div>
											
										</div>
										<input type="password" name="confrmpass" class="form-control rounded-0" placeholder="Confirm Password" autocomplete="off" required>
									</div>
								</div>
								
							</div>
							<div class="card-footer">
								<div class="clearfix">
								
									<input type="submit" name="generate" class="custombtn" value="Submit">
								
							</div>
							</div>
						</div>
						<p>Developed by <a href="https://inoday.com/" target="_blank"> inoday Inc.</a> | <a href="index.php" class="badge badge-dark"><i class="fas fa-back"></i> Back</a></p>
						</form>
						</div>
					</div> <!-- close innerlog -->
		
				</div>
				
				<div class="col-lg-2 col-md-2"></div>
			</div> <!-- close row -->
		
		
	 </div>  <!-- close weblogin -->


<?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/login-foot.php';
?>

