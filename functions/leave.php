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

		case "addtype":

		$ltype = $_POST['ltype'];

		$abbre = $_POST['abbre'];

		$p = $_GET['p'];

		$f = $_GET['f'];

		$active = $_POST['active'];

		$value = " `in_comid`, `in_leavetype`, `in_abbreviation`, `in_createdat`, `in_status`";

		$data = " '$comid', '$ltype','$abbre' ,now(),'$active'";

		$table = "in_leavetype";

		$funs = new Functions();

		$res = $funs->insertData($table,$value,$data);

		if($res == true)

		{

			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}

		break;

		case "editype":

		$table = "in_leavetype";

		$field = $_POST['ltype'];

		$abbre = $_POST['abbre'];

		$active = @$_POST['active'];

		$p = $_GET['p'];

		$f = $_GET['f'];

		$id = " in_sno='{$_GET['id']}' ";

		$data = " `in_comid`='$comid', in_leavetype='$field', `in_abbreviation`='$abbre', in_status='$active' ";

		$funs = new Functions();

		$res = $funs->updateData($table,$data,$id);

		header("Location:".VIEW.$f."/".$p.".php?case=save");

		break;

		case "del":

		$p = $_GET['p'];

		$table = "in_leavetype";

		$id = " in_sno='{$_GET['id']}' ";

		$funs = new Functions();

		$res = $funs->delData($table,$id);

		header("Location:".VIEW."leaves/".$p.".php");

		break;



		case "holidays":

		$leave = $_POST['leave'];

		$restricted = $_POST['restricted'];

		$leavdate = $_POST['leavdate'];

		$leavday = date('l', strtotime($leavdate));

		$leavyear = date('Y', strtotime($leavdate));

		$p = $_GET['p'];

		$active = $_POST['active'];

		$value = " `in_comid`, `in_leavname`, `in_leavetype`, `in_leavedate`, `in_leaveday`, `in_createdon`, `in_leaveyear`, `in_status`";

		$data = " '$comid', '$leave','$restricted','$leavdate','$leavday',now(),'$leavyear','$active'";

		$table = "in_holidays";

		$funs = new Functions();

		$res = $funs->insertData($table,$value,$data);

		if($res == true)

		{

			header("Location:".VIEW."leaves/".$p.".php?case=save");

		}

		break;

		case "editholy":

		$table = "in_holidays";

		$leave = $_POST['leave'];

		$leavetype = $_POST['leavetype'];

		$leavdate = $_POST['leavdate'];

		$leavday = date('l', strtotime($leavdate));

		$leavyear = date('Y', strtotime($leavdate));

		$active = @$_POST['active'];

		$p = $_GET['p'];

		$id = " in_sno='{$_GET['id']}' ";

		$data = " `in_comid`='$comid', `in_leavname`='$leave',`in_leavetype`='$leavetype',`in_leavedate`='$leavdate', `in_leaveday`='$leavday',`in_leaveyear`='$leavyear',`in_status`='$active' ";

		$funs = new Functions();

		$res = $funs->updateData($table,$data,$id);

		header("Location:".VIEW."leaves/".$p.".php?case=save");

		break;

		case "delholy":

		$p = $_GET['p'];

		$table = "in_holidays";

		$id = " in_sno='{$_GET['id']}' ";

		$funs = new Functions();

		$res = $funs->delData($table,$id);

		header("Location:".VIEW."leaves/".$p.".php");

		break;

		case "delete":

		$p = $_GET['p'];

		$f = $_GET['f'];

		$table = "in_leavesetup";

		$id = " in_sno='{$_GET['id']}' ";

		$funs = new Functions();

		$res = $funs->delData($table,$id);

		header("Location:".VIEW.$f."/".$p.".php");

		break;

		case "leavesetup":

		$params['comid'] = $comid;

		$params['leavetype'] = $_POST['leavetype'];

		$params['typecheck'] = $_POST['typecheck'];

		$params['effectivefrom'] = $_POST['effectivefrom'];

		$params['encashment'] = @$_POST['encashment'];

		$params['minibalance'] = @$_POST['minibalance'];

		$params['autoleave'] = @$_POST['autoleave'];

		$params['leavesno'] = @$_POST['leavesno'];

		$params['autoleavedate'] = @$_POST['autodate'];

		$params['leavexpire'] = @$_POST['leavexpire'];

		$params['carryforward'] = @$_POST['carryforward'];

		$params['carrymonth'] = @$_POST['carrymonth'];

		$params['lowerlimit'] = @$_POST['lowerlimit'];

		$params['lowertext'] = @$_POST['lowertext'];

		$params['higherlimit'] = @$_POST['higherlimit'];

		$params['highertext'] = @$_POST['highertext'];

		$params['allot'] = @$_POST['allot'];

		

		$params['allotdate'] = @$_POST['allotmonth'].";".@$_POST['allotdays'];



		$params['avail'] = @$_POST['avail'];

		$params['availdate'] = @$_POST['availmonth'].";".@$_POST['availdays'];

		$f = $_GET['f'];

		$p = $_GET['p'];

		

		$love = new Leaves();

		$rec = $love->leaveSetup($params);

		if($rec == true)

		{

			$table = "in_employee";

			$cond = " `in_compid`='$comid' AND `in_delete`='1' ";

			$select = new Selectall();

			$selemp = $select->getallCond($table,$cond);

			if(!empty($selemp))

			{

				foreach($selemp as $emp)

				{

					$table = "in_leavebalance";

					$value = " `in_compid`, `in_empid`, `in_leaveid`, `in_date`, `in_balance`, `in_status` ";

					$data = " '$comid', '{$emp['in_empid']}', '{$params['leavetype']}', now(), '0', '1' ";

					$fun = new Functions();

					$fun->insertData($table, $value, $data);

				}

			}

		}

		header("Location:".VIEW."leaves/leave-settings.php?case=setup");

		break;

		case "editsetup":

		$params['leavetype'] = $_POST['leavetype'];

		$params['typecheck'] = $_POST['typecheck'];

		$params['effectivefrom'] = $_POST['effectivefrom'];

		$params['encashment'] = @$_POST['encashment'];

		$params['minibalance'] = @$_POST['minibalance'];

		$params['autoleave'] = $_POST['autoleave'];

		$params['leavesno'] = @$_POST['leavesno'];

		$params['leavexpire'] = $_POST['leavexpire'];

		$params['carryforward'] = @$_POST['carryforward'];

		$params['carrymonth'] = @$_POST['carrymonth'];

		$params['lowerlimit'] = @$_POST['lowerlimit'];

		$params['lowertext'] = @$_POST['lowertext'];

		$params['higherlimit'] = @$_POST['higherlimit'];

		$params['highertext'] = @$_POST['highertext'];

		$params['allot'] = @$_POST['allot'];

		$params['autoleavedate'] = @$_POST['autodate'];

		

		$params['allotdate'] = @$_POST['allotmonth'].";".@$_POST['allotdays'];



		$params['avail'] = @$_POST['avail'];

		$params['availdate'] = @$_POST['availmonth'].";".@$_POST['availdays'];

		$params['id'] = $_GET['id'];

		$f = $_GET['f'];

		$p = $_GET['p'];

		$love = new Leaves();

		$rec = $love->updateSetup($params);

		header("Location:".VIEW."leaves/leave-settings.php?case=setup");

		break;

		case "opennings":

		
		$details = "Leave Opennings Balance";

		$lc = count($_POST['leaveno']);
		
		
		
		for($i=0;$i<$lc;$i++)

		{
			$emi = $_POST['eid'][$i];
			$lid = $_POST['leavid'][$i];

			$preid = $_POST['preid'];

			$lvno = $_POST['leaveno'][$i];

			
				

			$table = "in_leavebalance";

		    $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_leaveid`='$lid' ORDER BY in_sno DESC";

		    $select = new Selectall();

		    $std = $select->getcondData($table,$cond);

			

		    if($std != "")

		    {
		    	$fulbal = $std['in_balance'];
		    	$perbal = ($lvno+$fulbal);

		    	$table = "in_leavebalance";

		    	$value = " `in_comid`, `in_preid`, `in_empid`, `in_leaveid`, `in_leavedetails`, `in_credit` ,`in_date`, `in_balance`, `in_status` ";

		    	$data = " '$comid','$preid', '$emi','$lid','$details', '$lvno' ,now(),'$perbal','1'";
				

		      	$fun = new Functions();

				$fun->insertData($table, $value, $data);

		    }

		    else

		    {

		    	

		      	$table = "in_leavebalance";

		    	$value = " `in_comid`, `in_preid`, `in_empid`, `in_leaveid`, `in_leavedetails`, `in_credit` ,`in_date`, `in_balance`, `in_status` ";

		    	$data = " '$comid','$preid', '$emi','$lid','$details', '$lvno' ,now(),'$lvno','1'";
				

		      	$fun = new Functions();

				$fun->insertData($table, $value, $data);

		    }
			
		}
		
		
		
		$f = $_GET['f'];

		$p = $_GET['p'];

		header("Location:".VIEW.$f."/".$p.".php?case=save");

		break;

		case "editleave":

		$blid = $_POST['blid'];

		$bal = $_POST['bal'];

		$f = $_GET['f'];

		$p = $_GET['p'];

		$table = "in_leavebalance";

		$data = " `in_balance`='$bal' ";

		$id = " `in_sno`='$blid' ";

		$fun = new Functions();

		$fun->updateData($table,$data,$id);

		header("Location:".VIEW.$f."/".$p.".php?case=save");

		break;

		case "applyleave":

		$f = $_GET['f'];

		$p = $_GET['p'];

		$lid = $_POST['leavetype'];

		$startdate = $_POST['startdate'];

		$startday = $_POST['startday'];

		$enddate = $_POST['enddate'];

		$endday = $_POST['endday'];

		$applylov = $_POST['leaveday'];

		$leavbal = $_POST['leavebolance'];

		$contact = $_POST['contact'];

		$email = $_POST['email'];

		$document = $_FILES['document']["name"];

		$target_dir = "../uploads/leavesdoc";
		$target_file = $target_dir . basename($document);
		move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

		$statement = $_POST['statement'];
		$statement = str_replace("'", "\'", $statement);

		$rest = $leavbal-$applylov;

		if($rest <= 0)
		{
			$loss = $applylov-$leavbal;
			$table = "in_applyleaves";
			$value = " `in_comid`, `in_empid`, `in_leaveid`, `in_startdate`, `in_startday`, `in_enddate`, `in_endday`, `in_applyday`, `in_beforebal`, `in_afterbalan`, `in_lossofpay`, `in_reason`, `in_contact`, `in_email`, `in_applydate`,`in_attachment`, `in_status` ";
			$data = " '$comid', '$empid', '$lid', '$startdate', '$startday', '$enddate', '$endday', '$applylov', '$leavbal', '0', '$loss', '$statement', '$contact', '$email', '$fdate','$document', '1' ";
			$fun = new Functions();
			$fun->insertData($table,$value,$data);
		}
		else
		{
			$table = "in_applyleaves";
			$value = " `in_comid`, `in_empid`, `in_leaveid`, `in_startdate`, `in_startday`, `in_enddate`, `in_endday`, `in_applyday`, `in_beforebal`, `in_afterbalan`, `in_lossofpay`, `in_reason`, `in_contact`, `in_email`, `in_applydate`, `in_attachment`,`in_status` ";
			$data = " '$comid', '$empid', '$lid', '$startdate', '$startday', '$enddate', '$endday', '$applylov', '$leavbal', '$rest', '0', '$statement', '$contact', '$email', '$fdate','$document','1' ";
			$fun = new Functions();
			$fun->insertData($table,$value,$data);
		}

		header("Location:".VIEW.$f."/".$p.".php?case=save");

		break;

		case "editapply":



		$id = $_GET['id'];

		$f = $_GET['f'];

		$p = $_GET['p'];

		$lid = $_POST['leavetype'];

		$startdate = $_POST['startdate'];

		$startday = $_POST['startday'];

		$enddate = $_POST['enddate'];

		$endday = $_POST['endday'];

		$applylov = $_POST['leaveday'];

		$leavbal = $_POST['leavebolance'];

		$contact = $_POST['contact'];

		$email = $_POST['email'];

		$document = $_FILES['document']["name"];

		$target_dir = "../uploads/leavesdoc";
		$target_file = $target_dir . basename($document);
		move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

		$statement = $_POST['statement'];
		$statement = str_replace("'", "\'", $statement);

		$rest = $leavbal-$applylov;

		if($rest <= 0)
		{
			$loss = $applylov-$leavbal;
			$table = "in_applyleaves";
			$data = " `in_comid`='$comid', `in_empid`='$empid', `in_leaveid`='$lid', `in_startdate`='$startdate', `in_startday`='$startday', `in_enddate`='$enddate', `in_endday`='$endday', `in_applyday`='$applylov', `in_beforebal`='$leavbal', `in_afterbalan`='0', `in_lossofpay`='$loss', `in_reason`='$statement', `in_contact`='$contact', `in_email`='$email', `in_applydate`='$fdate', `in_attachment`='$document', `in_status`='1' ";
			$cond = " `in_sno`='$id' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
		}
		else
		{
			$table = "in_applyleaves";
			$data = " `in_comid`='$comid', `in_empid`='$empid', `in_leaveid`='$lid', `in_startdate`='$startdate', `in_startday`='$startday', `in_enddate`='$enddate', `in_endday`='$endday', `in_applyday`='$applylov', `in_beforebal`='$leavbal', `in_afterbalan`='$rest', `in_lossofpay`='0', `in_reason`='$statement', `in_contact`='$contact', `in_email`='$email', `in_applydate`='$fdate', `in_attachment`='$document', `in_status`='1' ";
			$cond = " `in_sno`='$id' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
		}
		header("Location:".VIEW.$f."/".$p.".php?case=save");

		break;
		case "deleave":
		$id = " in_sno='{$_GET['id']}' ";
		$table = "in_applyleaves";
		$fun = new Functions();
		$fun->delData($table,$id);
		header("Location:".VIEW."leaves/manage-leave.php");
		break;

		case "actleave":

		$f = $_GET['f'];

		$p = $_GET['p'];

		$lid = $_GET['id'];



		$table = "in_leavesetup";

		$cond = " `in_sno`='$lid' ";

		$select = new Selectall();

		$leav = $select->getcondData($table,$cond);

		$lstatus = $leav['in_status'];

		if($lstatus == "1")

		{

			$table = "in_leavesetup";

			$data = " `in_status`='0' ";

			$cond = " `in_sno`='$lid' ";

			

		}

		else

		{

			$table = "in_leavesetup";

			$data = " `in_status`='1' ";

			$cond = " `in_sno`='$lid' ";

		}

		$fun = new Functions();

		$fun->updateCond($table,$data,$cond);

		header("Location:".VIEW.$f."/".$p.".php");

		break;

		case "acceptleave":

		$id = $_POST['id'];

		$lid = $_POST['lid'];

		$accept = $_POST['formaccept'];

		$comment = $_POST['comment'];

		$levday = @$_POST['levday'];
		$prid = $_POST['prid'];

		$emi = $_POST['emi'];
		$rest = $_POST['rest'];

		if($accept == "1")
		{
			$table = "in_leavebalance";
            $value = " `in_comid`, `in_preid`, `in_empid`, `in_leaveid`, `in_leavedetails`, `in_debit`, `in_date`, `in_balance`, `in_status` ";
            $data = " '$comid', '$prid', '$emi', '$lid', 'Applied Leave', '$levday' , now(), '$rest', '1' ";
            $fun = new Functions();
            $fun->insertData($table, $value, $data);

			

			$table = "in_applyleaves";
			$data = " `in_approvedate`='$fdate', `in_approvedby`='$empid', `in_approvstatus`='$accept', `in_rejectreason`='$comment' ";
			$cond = " `in_sno`='$id' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
		}
		else
		{
			$table = "in_applyleaves";
			$data = " `in_approvedate`='$fdate', `in_approvedby`='$empid', `in_approvstatus`='2', `in_rejectreason`='$comment' ";
			$cond = " `in_sno`='$id' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
		}
		header("Location:".VIEW."approvals/leave-approval.php?case=save");

		break;

		
		case "sandwichrule":
		$f = $_GET['f'];
		$p = $_GET['p'];
		$sandhit = $_POST['sandhit'];
		$table = "in_companyinfo";
		$data = " `in_sandwich`='$sandhit'";
		$cond = " `in_comid`='$comid' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW.$f."/".$p.".php");
		break;
		case "sandholiday":
		$f = $_GET['f'];
		$p = $_GET['p'];
		$sandholi = $_POST['sandholi'];
		$table = "in_companyinfo";
		$data = " `in_sandholiday`='$sandholi'";
		$cond = " `in_comid`='$comid' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW.$f."/".$p.".php");
		break;
		case "clubleave":
		
		$leavty = "";
		$orderpr = "";
		$clubgroup = $_POST['clubgroup'];
		$leavid = $_POST['leavid'];
		if(!empty($leavid))
		{
			$i=0;
			foreach($leavid as $lid)
			{
				$leavty .= $lid.";";
				$i++;
			}

		}
		
		$priority = $_POST['priority'];
		if(!empty($priority))
		{
			$i=0;
			foreach($priority as $prio)
			{
				$orderpr .= $prio.";";
				$i++;
			}

		}
		$cantrash = $_POST['cantrash'];
		$params['leavfull'] = $leavty;
		$params['proxid'] = $orderpr;
		$params['clubname'] = $clubgroup;
		$params['cantrash'] = $cantrash;
		$params['comid'] = $comid;
		$params['grtype'] = "clubLeave";
		$love = new Leaves();
		$love->leaveGroup($params);
		
		header("Location:".VIEW."leaves/leave-settings.php?case=club");
		break;
		case "leavegoup":
		$leavty = "";
		$orderpr = "";
		$clubgroup = $_POST['clubgroup'];
		$leavid = $_POST['leavid'];
		if(!empty($leavid))
		{
			$i=0;
			foreach($leavid as $lid)
			{
				$leavty .= $lid.";";
				$i++;
			}

		}
		
		$priority = $_POST['priority'];
		if(!empty($priority))
		{
			$i=0;
			foreach($priority as $prio)
			{
				$orderpr .= $prio.";";
				$i++;
			}

		}
		$cantrash = $_POST['cantrash'];
		$params['leavfull'] = $leavty;
		$params['proxid'] = $orderpr;
		$params['clubname'] = $clubgroup;
		$params['cantrash'] = $cantrash;
		$params['comid'] = $comid;
		$params['grtype'] = "groupLeave";
		$love = new Leaves();
		$love->leaveGroup($params);
		
		header("Location:".VIEW."leaves/leave-settings.php?case=group");
		break;
		case "dropleave":

		$id = $_POST['id'];
		$lid = $_POST['lid'];

		$comment = $_POST['comment'];

		$levday = @$_POST['levday'];
		$prid = $_POST['prid'];

		$emi = $_POST['emi'];
		$rest = $_POST['rest'];

		$table = "in_leavebalance";
        $value = " `in_comid`, `in_preid`, `in_empid`, `in_leaveid`, `in_leavedetails`, `in_credit`, `in_date`, `in_balance`, `in_status` ";
        $data = " '$comid', '$prid', '$emi', '$lid', 'Leave Canclation', '$levday' , now(), '$rest', '1' ";
        $fun = new Functions();
        $fun->insertData($table, $value, $data);

		$table = "in_applyleaves";
		$data = " `in_approvstatus`='3', `in_cancledate`='$fdate', `in_canclereason`='$comment', `in_cancleday`='$levday', `in_cancleby`='$empid', `in_carrybalance`='$rest' ";
		$cond = " `in_sno`='$id' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."leaves/leave-history.php");
		break;

		

	}

}