

<?php

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/login-head.php';

?>

	<div class="weblogin">

		<div class="row">

			<div class="col-lg-3 col-md-3">

				<div class="sidestrip">

					<img src="../../assets/dist/img/inolgo.png">

					<p>World's Leading Provider of Cloud Business Management ERP Software NetSuite lionizes <span class="font-weight-bold"> inoday India's #1 NetSuite Solution Provider</span></p>

					<a href="https://inoday.com/contactus/" class="btn btn-primary" target="_blank"><i class="fas fa-envelope"></i> Contact Us</a>

				</div>

			</div>

			<div class="col-lg-7 col-md-7">

				

					<div class="row">

						<div class="col-lg-4 col-md-4"></div>

						<div class="col-lg-8 col-md-8">

							<div class="innerlog" id="loginform">

			<h2>Welcome to Employee Management System</h2>

			<form class="" method="POST" action="../../functions/login.php?case=login">

			<div class="card">

				<div class="card-header bg-light">

					<h3 class="card-title">Login</h3>

				</div>

				

				<div class="card-body">

					<div class="form-group row">

						<label class="col-lg-4 col-form-label">User Name/Email</label>

						<div class="input-group col-lg-8">

							

							<div class="input-group-prepend">

								<div class="input-group-text rounded-0"><i class="fa fa-user"></i></div>

								

							</div>

							<input type="text" name="userpro" class="form-control rounded-0" placeholder="Username/Email" autocomplete="on" required>

						</div>

					</div>

					<div class="form-group row">

						<label class="col-lg-4 col-form-label">Password*</label>

						<div class="input-group col-lg-8">

							

							<div class="input-group-prepend">

								<div class="input-group-text rounded-0"><i class="fa fa-lock"></i></div>

								

							</div>

							<input type="password" name="passpro" class="form-control rounded-0" placeholder="Password" autocomplete="on" required id="password">

						</div>

					</div>

					<div id="popover-password" style="display: none;">
					<p><span id="result"></span></p>
					<div class="progress">
					<div id="password-strength" class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
					</div>
					</div>
					<ul class="list-unstyled">
					<li class="">
					<span class="low-upper-case">
					<i class="fas fa-circle" aria-hidden="true"></i>
					&nbsp;Lowercase &amp; Uppercase
					</span>
					</li>
					<li class="">
					<span class="one-number">
					<i class="fas fa-circle" aria-hidden="true"></i>
					&nbsp;Number (0-9)
					</span> 
					</li>
					<li class="">
					<span class="one-special-char">
					<i class="fas fa-circle" aria-hidden="true"></i>
					&nbsp;Special Character (!@#$%^&*)
					</span>
					</li>
					<li class="">
					<span class="eight-character">
					<i class="fas fa-circle" aria-hidden="true"></i>
					&nbsp;Atleast 8 Character
					</span>
					</li>
					</ul>
					</div>

					<?php

						if(isset($_GET['case']) && isset($_GET['msg']))

						{

							$case = $_GET['case'];

							$msg = $_GET['msg'];

							

							switch($case)

							{

								case "Warning";

								?>

								<script type="text/javascript">

									$(document).Toasts('create', {

										class: 'bg-maroon',

								        title: 'Warning',

								        autohide: true,

								        delay: 3000,

								        body: <?php echo "'".$msg."'";?>

								      });

								</script>

								<?php

								break;

								case "Success";

								?>

								<script type="text/javascript">

									$(document).Toasts('create', {

										class: 'bg-success',

								        title: 'Success',

								        autohide: true,

								        delay: 3000,

								        body: <?php echo "'".$msg."'";?>

								      });

								</script>

								<?php

								break;

							}

							

							

						}

					?>

					

				</div>

				<div class="card-footer">

					<div class="clearfix">

					

						<input type="submit" name="userlog" class="custombtn" value="Login">

					

				</div>

				</div>

			</div>

			</form>

			<p>&copy <?php echo date('Y');?>. Developed by <a href="https://inoday.com/" target="_blank"> inoday Inc.</a> | <span id="forgetpassword" class="logspan">Forgot Password</span> </p>

			

		</div> <!-- close innerlog -->

		<div class="innerlog" style="display: none;" id="forgetform">

			<h2>Welcome to Employee Management System</h2>

			<form class="" method="POST" action="../../functions/login.php?case=change">

			<div class="card">

				<div class="card-header bg-light">

					<h3 class="card-title">Forgort Password</h3>

				</div>

				

				<div class="card-body">

					<div class="form-group row">

						<label class="col-lg-4 col-form-label">Username/Email*</label>

						<div class="input-group col-lg-8">

							

							<div class="input-group-prepend">

								<div class="input-group-text rounded-0"><i class="fa fa-user"></i></div>

								

							</div>

							<input type="text" name="userpro" class="form-control rounded-0" placeholder="Username/Email" autocomplete="off" required>

						</div>

					</div>

					

				</div>

				<div class="card-footer">

					<div class="clearfix">

					

						<input type="submit" name="userfor" class="custombtn" value="Submit">

					

				</div>

				</div>

			</div>

			<p>&copy <?php echo date('Y');?>. Developed by <a href="https://inoday.com/" target="_blank">inoday Inc.</a> | <span id="getloginform" class="logspan">Login</span> </p>

			</form>

		</div> <!-- close innerlog -->

						</div>



					</div>

				

				

			</div>

			<div class="col-lg-2 col-md-2"></div>

		</div>

		

		

	 </div>  <!-- close weblogin -->

	 <script type="text/javascript"> 

        window.history.forward(); 


    </script>
    <script type="text/javascript">
    	$("#password").keypress(function(){
    		$("#popover-password").show();
    	});
    	$("#password").click(function(){
    		$("#popover-password").show();
    	});
 
let state = false;
let password = document.getElementById("password");
let passwordStrength = document.getElementById("password-strength");
let lowUpperCase = document.querySelector(".low-upper-case i");
let number = document.querySelector(".one-number i");
let specialChar = document.querySelector(".one-special-char i");
let eightChar = document.querySelector(".eight-character i");
 
password.addEventListener("keyup", function(){
    let pass = document.getElementById("password").value;
    checkStrength(pass);
});
 
function toggle(){
    if(state){
        document.getElementById("password").setAttribute("type","password");
        state = false;
    }else{
        document.getElementById("password").setAttribute("type","text")
        state = true;
    }
}
 
function myFunction(show){
    show.classList.toggle("fa-eye-slash");
}
 
function checkStrength(password) {
    let strength = 0;
 
    //If password contains both lower and uppercase characters
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
        lowUpperCase.classList.remove('fa-circle');
        lowUpperCase.classList.add('fa-check');
    } else {
        lowUpperCase.classList.add('fa-circle');
        lowUpperCase.classList.remove('fa-check');
    }
    //If it has numbers and characters
    if (password.match(/([0-9])/)) {
        strength += 1;
        number.classList.remove('fa-circle');
        number.classList.add('fa-check');
    } else {
        number.classList.add('fa-circle');
        number.classList.remove('fa-check');
    }
    //If it has one special character
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
        specialChar.classList.remove('fa-circle');
        specialChar.classList.add('fa-check');
    } else {
        specialChar.classList.add('fa-circle');
        specialChar.classList.remove('fa-check');
    }
    //If password is greater than 7
    if (password.length > 7) {
        strength += 1;
        eightChar.classList.remove('fa-circle');
        eightChar.classList.add('fa-check');
    } else {
        eightChar.classList.add('fa-circle');
        eightChar.classList.remove('fa-check');   
    }
 
    // If value is less than 2
    if (strength < 2) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-danger');
        passwordStrength.style = 'width: 10%';
    } else if (strength == 3) {
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-warning');
        passwordStrength.style = 'width: 60%';
    } else if (strength == 4) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-success');
        passwordStrength.style = 'width: 100%';
    }
}
</script>
<style type="text/css">
	.progress {
    height: 3px!important;
	}
	.progress-bar-success
	{
		background-color: #02b502;
	}
	.fa-check
	{
		color: #02b502;
	}
</style>
<?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/login-foot.php';

?>



