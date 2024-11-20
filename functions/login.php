<?php

if(!defined('BSPATH'))

{

	$bspath = dirname((__DIR__));

	include_once $bspath.'/core/core.php';

}

$params = array();



if(isset($_GET['case']))

{

	$case = $_GET['case'];



	switch($case)

	{

		case "login":



		if(isset($_POST['userlog']))

		{

			function validate($data)

			{

				$data = trim($data);

				$data = stripslashes($data);

				$data = htmlspecialchars($data);

				return $data;

			}

			$userpro = validate($_POST['userpro']);

			$passpro = validate($_POST['passpro']);

			$passpro = md5($passpro);



			$db = new Database();

			$userpro = mysqli_real_escape_string($db->conn,$userpro);



			$select = new Selectall();

			$table = "in_employee";

			$cond = " (`in_email`='$userpro' OR `in_username`='$userpro') AND `in_delete`='1' ";

			$uid = $select->getcondData($table,$cond);
			if($uid != "")
			{
				$id = $uid['in_empid'];
				
				$select = new Selectall();
				$rest = $select->checkExpiry($userpro,$id);
			}

			
      		if($rest <= 0)

      		{
      			
      			header("Location:".VIEW."login/password.php?case=expire&id=$id");

      		}

      		else

      		{

      			$passpro = mysqli_real_escape_string($db->conn,$passpro);

      			$urlog = new Userlogin();

				$res = $urlog->loginprocess($userpro,$passpro);

      			

				if($res != "")

				{
					

					$_SESSION['empid'] = $res['in_empid'];

					$_SESSION['fname'] = $res['in_fname'];

					$_SESSION['lnmae'] = $res['in_lname'];

					$_SESSION['grid'] = $res['in_groupid'];

					$_SESSION['post'] = $res['in_designation'];

					$_SESSION['pemail'] = $res['in_email'];

					$_SESSION['uname'] = $res['in_username'];

					$_SESSION['comid'] = $res['in_compid'];

					$_SESSION['preid'] = $res['in_emprefix'];

					



					$params['fname'] = $res['in_fname'];

					$params['femail'] = $res['in_email'];

					$params['fuser'] = $res['in_username'];



					$table = "in_employee";

					$cond = " `in_email`='{$params['femail']}' ";

					$select = new Selectall();

					$comsid = $select->getcondData($table,$cond); 

					$coid = $comsid['in_compid'];

					$params['empid'] = $comsid['in_empid'];

					$params['preid'] = $comsid['in_emprefix'];

					$params['coid'] = $coid;

					$urlog->userlog($params);



					$dash = new Dashboard();

      				$dash->loginUser($params);

					

					header('Location:'.VIEW.'dashboard');

				}

				else

				{

					header("Location:".VIEW."login/index.php?case=login");

				}

			}



		}		



		break;

		case "change":

		if(isset($_POST['userfor']))

		{

			function validate($data)

			{

				$data = trim($data);

				$data = stripslashes($data);

				$data = htmlspecialchars($data);

				return $data;

			}

			$userpro = validate($_POST['userpro']);

			$db = new Database();

			$userpro = mysqli_real_escape_string($db->conn,$userpro);



			$urlog = new Userlogin();

			$res = $urlog->loginRest($userpro);

			$res = explode(',', $res);

			$firstr = $res[0];

			$secstr = $res[1];



			header("Location:".VIEW."login/index.php?case=$firstr&msg=$secstr");

		}

		break;

		case "generate":

		if(isset($_POST['generate']))

		{

			function validate($data)

			{

				$data = trim($data);

				$data = stripslashes($data);

				$data = htmlspecialchars($data);

				return $data;

			}

			$userpro = validate($_POST['userpro']);

			$db = new Database();

			$userpro = mysqli_real_escape_string($db->conn,$userpro);

			$urlog = new Userlogin();

			$res = $urlog->checkLogin($userpro);

			$rid = $res['in_empid'];

			if($res == true)

			{

				header("Location:".VIEW."login/password.php?id=$rid");

			}

			else

			{

				header("Location:".VIEW."login/index.php?case=logerr");

			}

			

		}

		break;

		case "password":

		if(isset($_GET['id']))

		{

			function validate($data)

			{

				$data = trim($data);

				$data = stripslashes($data);

				$data = htmlspecialchars($data);

				return $data;

			}



			$id = $_GET['id'];

			$userpass = validate($_POST['userpass']);

			$confrmpass = validate($_POST['confrmpass']);



			if($userpass === $confrmpass)

			{

				$params['userpass'] = md5($userpass);

				$params['id'] = $id;

				$params['date'] = $cdate;

				$urlog = new Userlogin();

				$res = $urlog->updatePass($params);

				header("Location:".VIEW."employee/manage-employee.php?case=passup");

			}

			else

			{

				header("Location:".VIEW."employee/manage-employee.php?case=passnt");

			}

		}

		break;

		

	}

}

	



