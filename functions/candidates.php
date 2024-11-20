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

		case "candidate":

		if(isset($_POST['savecan']))

		{

			$target_dir = "../uploads/candidate/";


			$params['applypost'] = $_POST['applypost'];

			$params['fulname'] = $_POST['fulname'];

			$params['mobile'] = $_POST['mobile'];

			$params['email'] = $_POST['email'];

			$params['location'] = $_POST['location'];

			$params['ctc'] = $_POST['ctc'];

			$params['expected'] = $_POST['expected'];

			$params['notice'] = $_POST['notice'];

			$params['qulifi'] = $_POST['qulifi'];

			$params['doj'] = $_POST['doj'];

			$params['company'] = $_POST['company'];

			$params['postion'] = $_POST['postion'];

			$params['resume'] = $_FILES['resume']['name'];

			$params['techno'] = $_POST['techno'];

			$params['feedback'] = $_POST['feedback'];

			$params['create'] = $fdate;

			$table = "in_candidates";
			$cond = " in_mobile ='{$params['mobile']}' ";
			$select = new Selectall();
			$salup = $select->getcondData($table,$cond);
			if($salup != "")
			{
				header("Location:".VIEW."recruitment/candidates.php?case=canerr");
			}
			else
			{
				$can = new Candidates();

				$res = $can->candidateInfo($params);

				if($res == true)

				{

					$target_file = $target_dir . basename($_FILES["resume"]["name"]);

					move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);



					header("Location:".VIEW."recruitment/candidates.php?case=save");

				}

				else

				{

					header("Location:".VIEW."recruitment/candidates.php?case=unsave");

				}
			}

			





		}

		break;

		case "editcan":

		   $target_dir = "../uploads/candidate/";



			$params['fulname'] = $_POST['fulname'];

			$params['mobile'] = $_POST['mobile'];

			$params['email'] = $_POST['email'];

			$params['location'] = $_POST['location'];

			$params['ctc'] = $_POST['ctc'];

			$params['expected'] = $_POST['expected'];

			$params['notice'] = $_POST['notice'];

			$params['qulifi'] = $_POST['qulifi'];

			$params['doj'] = $_POST['doj'];

			$params['company'] = $_POST['company'];

			$params['postion'] = $_POST['postion'];

			$params['resume'] = $_FILES['resume']['name'];

			$params['techno'] = $_POST['techno'];

			$params['feedback'] = $_POST['feedback'];

			$params['create'] = $fdate;

			$params['id'] = $_GET['id'];


			$table = "in_candidates";
			$cond = " `in_mobile`='{$params['mobile']}' ";
			$select = new Selectall();
			$check = $select->getcondData($table,$cond);
			if($check != "")
			{
				header("Location:".VIEW."recruitment/candidates.php?case=canerr");
			}
			else
			{
				$can = new Candidates();

				$res = $can->updateInfo($params);

				if($res == true)

				{

					$target_file = $target_dir . basename($_FILES["resume"]["name"]);

					move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);



					header("Location:".VIEW."recruitment/candidates.php?case=save");

				}

				else

				{

					header("Location:".VIEW."recruitment/candidates.php?case=unsave");

				}
			}
			

		break;

		case "delData":

		$table = "in_candidates";

		$id = " in_sno='{$_GET['id']}' ";

		$fun = new Functions();

		$res = $fun->delData($table,$id);

		header("Location:".VIEW."recruitment/applications.php");

		break;
		case "jobapplication":
		if(isset($_POST['publish']))
		{
			$apptype = $_POST['apptype'];
			$jobtitle = $_POST['jobtitle'];
			$jobtype = $_POST['jobtype'];
			$vacanyno = $_POST['vacanyno'];
			$assignpos = $_POST['assignpos'];
			$explevel = $_POST['explevel'];
			$posname = $_POST['posname'];
			$jobdepart = $_POST['jobdepart'];
			$miniquality = $_POST['miniquality'];
			$minictc = $_POST['minictc'];
			$maxctc = $_POST['maxctc'];
			$contents = $_POST['contents'];
			$startdate = $_POST['startdate'];
			$enddate = $_POST['enddate'];
			$jobappid = $_POST['jobappid'];

			$table = "in_jobapplication";
			$value = "  `in_comid`, `in_spljobid`, `in_apptype`, `in_jobtitle`, `in_jobtype`, `in_noofposition`, `in_assingto`, `in_explevel`, `in_openingfor`, `in_department`, `in_qualification`, `in_minictc`, `in_maxctc`,`in_startdate`,`in_enddate`, `in_content`, `in_publish`, `in_pubdate`, `in_createdby`, `in_createdat`, `in_status` ";
			$data = " '$comid', '$jobappid', '$apptype', '$jobtitle', '$jobtype','$vacanyno','$assignpos', '$explevel', '$posname', '$jobdepart', '$miniquality', '$minictc', '$maxctc', '$startdate', '$enddate', '$contents', '1' , now(), '$empid', now(), '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
			header("Location:".VIEW."recruitment/job-openings.php?case=save");

		}
		if(isset($_POST['draft']))
		{
			$apptype = $_POST['apptype'];
			$jobtitle = $_POST['jobtitle'];
			$jobtype = $_POST['jobtype'];
			$vacanyno = $_POST['vacanyno'];
			$assignpos = $_POST['assignpos'];
			$explevel = $_POST['explevel'];
			$posname = $_POST['posname'];
			$jobdepart = $_POST['jobdepart'];
			$miniquality = $_POST['miniquality'];
			$minictc = $_POST['minictc'];
			$maxctc = $_POST['maxctc'];
			$contents = $_POST['contents'];
			$startdate = $_POST['startdate'];
			$enddate = $_POST['enddate'];
			$jobappid = $_POST['jobappid'];

			$table = "in_jobapplication";
			$value = "  `in_comid`, `in_spljobid`, `in_apptype`, `in_jobtitle`, `in_jobtype`,`in_noofposition`, `in_assingto`, `in_explevel`, `in_openingfor`, `in_department`, `in_qualification`, `in_minictc`, `in_maxctc`,`in_startdate`,`in_enddate`, `in_content`, `in_publish`, `in_pubdate`, `in_createdby`, `in_createdat`, `in_status` ";
			$data = " '$comid', '$jobappid', '$apptype', '$jobtitle', '$jobtype', '$vacanyno','$assignpos', '$explevel', '$posname', '$jobdepart', '$miniquality', '$minictc', '$maxctc', '$startdate', '$enddate', '$contents', '0' , now(), '$empid', now(), '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
			header("Location:".VIEW."recruitment/job-openings.php?case=save");
		}
		
		break;
		case "jobrequest":
		if(isset($_POST['publish']))
		{
			$requestype = $_POST['requestype'];
			$managelist = @$_POST['managelist'];
			$jobtitle = $_POST['jobtitle'];
			$jobtype = $_POST['jobtype'];
			$explevel = $_POST['explevel'];
			$posname = $_POST['posname'];
			$jobdepart = $_POST['jobdepart'];
			$miniquality = $_POST['miniquality'];
			$joblocation = $_POST['joblocation'];
			$vacancyno = $_POST['vacancyno'];
			$contents = $_POST['contents'];

			$table = "in_jobrequest";
			$value = " `in_comid`, `in_requestype`, `in_manager`, `in_jobtitle`, `in_jobtype`, `in_exprience`, `in_position`, `in_department`, `in_qualification`, `in_joblocation`, `in_vacancy`, `in_content`, `in_reqestdate`, `in_requestby`, `in_requestatus`,`in_publish`, `in_publishdate`, `in_status` ";
			$data = " '$comid', '$requestype', '$managelist', '$jobtitle', '$jobtype', '$explevel', '$posname', '$jobdepart', '$miniquality', '$joblocation', '$vacancyno', '$contents', now(), '$empid', '1', '1','$cdate','1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
			header("Location:".VIEW."recruitment/opening-request.php?case=save");
		}
		if(isset($_POST['draft']))
		{
			$requestype = $_POST['requestype'];
			$managelist = @$_POST['managelist'];
			$jobtitle = $_POST['jobtitle'];
			$jobtype = $_POST['jobtype'];
			$explevel = $_POST['explevel'];
			$posname = $_POST['posname'];
			$jobdepart = $_POST['jobdepart'];
			$miniquality = $_POST['miniquality'];
			$joblocation = $_POST['joblocation'];
			$vacancyno = $_POST['vacancyno'];
			$contents = $_POST['contents'];

			$table = "in_jobrequest";
			$value = " `in_comid`, `in_requestype`, `in_manager`, `in_jobtitle`, `in_jobtype`, `in_exprience`, `in_position`, `in_department`, `in_qualification`, `in_joblocation`, `in_vacancy`, `in_content`, `in_reqestdate`, `in_requestby`, `in_requestatus`,`in_publish`, `in_publishdate`, `in_status` ";
			$data = " '$comid', '$requestype', '$managelist', '$jobtitle', '$jobtype', '$explevel', '$posname', '$jobdepart', '$miniquality', '$joblocation', '$vacancyno', '$contents', now(), '$empid', '1', '0','$cdate','1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
			header("Location:".VIEW."recruitment/opening-request.php?case=save");
		}
		
		break;
		case "jobdraft":
		$id = $_GET['id'];
		$s = $_GET['s'];
		$table = "in_jobrequest";
		$data = " in_publish ='$s' ";
		$cond = " in_sno='$id' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/opening-request.php?case=save");
		break;
		case "jobdelete":
			$id = $_GET['id'];
			$table = "in_jobrequest";
			$id = " in_sno='$id' ";
			$fun = new Functions();
			$res = $fun->delData($table,$id);
			header("Location:".VIEW."recruitment/opening-request.php?case=save");
		break;
		case "appdraft":
		$id = $_GET['id'];
		$s = $_GET['s'];
		$table = "in_jobapplication";
		$data = " in_publish ='$s' ";
		$cond = " in_sno='$id' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/job-openings.php?case=save");
		break;
		case "appdelete":
			$id = $_GET['id'];
			$table = "in_jobapplication";
			$id = " in_sno='$id' ";
			$fun = new Functions();
			$res = $fun->delData($table,$id);
			header("Location:".VIEW."recruitment/job-openings.php?case=save");
		break;
		case "createinterview":
		$interviewtype = $_POST['interviewtype'];
		$canid = $_POST['canid'];
		$canname = $_POST['canname'];
		$clientname = $_POST['clientname'];
		$jobtitle = $_POST['jobtitle'];
		$fromdate = $_POST['fromdate'];

		$assets = $_POST['assets'];
		$interviewer = $_POST['interviewer'];
		$rounds = count($interviewer);
		
				
		for($x=0;$x<$rounds;$x++)
		{
			$p = $x+1;
			$table = "in_interviews";
			$value = " `in_comid`, `in_interviewtype`, `in_candidateid`, `in_clientname`, `in_jobtitle`, `in_fromdate`, `in_assessment`, `in_round`, `in_interviewer`, `in_anyattachment`, `in_createdon`, `in_createdby`, `in_status` ";
			$data = " '$comid', '$interviewtype', '$canid','$clientname', '$jobtitle', '$fromdate', '$assets[$x]', '$p Round', '$interviewer[$x]', '$anyattach', now(), '$empid', '1' ";
			
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
		}
		
		$anyattach = $_FILES["anyattach"]["name"];

		$target_dir = "../uploads/candidate/";
		$target_file = $target_dir . basename($_FILES["anyattach"]["name"]);
		move_uploaded_file($_FILES["anyattach"]["tmp_name"], $target_file);

		

		$inndate = date('Y-m-d', strtotime($fromdate));
		$table = "in_candidates";
		$data = " `in_interviewtype`='$interviewtype', `in_interviewdate`='$inndate', `in_interviewround`='$rounds Rounds', `in_interviewsatus`= 'Scheduled' ";
		$cond = " in_sno='$canid' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/interviews.php?case=save");

		break;
		case "questionset":

		$setid = $_POST['quesid'];

		$questions = $_POST['question'];
		$question = str_replace("'","\'", $questions);
		$range = $_POST['range'];
		$comment = $_POST['comment'];
		
		$ques = count($question);
		for($i=0;$i<$ques;$i++)
		{
			$table = "in_questionset";
			$value = " `in_comid`, `in_setid`, `in_question`, `in_range`, `in_comment`, `in_createdon`, `in_createdby`, `in_status` ";
			$data = " '$comid', '$setid', '$question[$i]', '$range[$i]', '$comment[$i]',now(), '$empid','1' ";
			
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
		}
		
		header("Location:".VIEW."recruitment/assessment.php?case=save");
		break;
		case "assetgroup":
		$assets = $_POST['assets'];
		$table = "in_master_card";
		$value = " `in_prefix`, `in_relation`, `in_status` ";
		$data = " '$assets', 'Assessment', '1' ";
		$fun = new Functions();
		$fun->insertData($table, $value, $data);
		header("Location:".VIEW."recruitment/assessment-set.php?case=save");
		break;
		case "feedback":
		
		$srid = $_POST['srid'];
		$canid = $_POST['canid'];
		$assetid = $_POST['assetid'];
		$pround = $_POST['pround'];

		$quesid = $_POST['quesid'];
		$range = $_POST['range'];
		$content = $_POST['content'];

		$intifeedback = $_POST['intifeedback'];

		$qyes = count($quesid);

		$recommend = $_POST['recommend'];

		$sround = $_POST['sround'];
		if(isset($sround))
		{
			if($recommend == "Yes")
			{
				for($i=0;$i<$qyes;$i++)
				{
					$table = "in_interviewmarking";
					$value = " `in_comid`, `in_canid`, `in_assmid`, `in_quesid`, `in_ratings`, `in_feedback`, `in_action`, `in_interviewby`, `in_takendate`, `in_status ";
					$data = " '$comid', '$canid', '$assetid','$quesid[$i]', '$range[$i]', '$content[$i]', 'Selected', '$empid','1' ";
					
					$fun = new Functions();
					$fun->insertData($table, $value, $data);
				}
				
				$table = "in_candidates";
				$data = " `in_interviewsatus`= 'All Round Clear', `in_negoround`='Null' ";
				$cond = " in_sno='$canid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);

				$table = "in_interviews";
				$data = " `in_roundstatus`= 'Selected', `in_comment`='$intifeedback' ";
				$cond = " in_sno='$srid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);
			}
			else
			{
				for($i=0;$i<$qyes;$i++)
				{
					$table = "in_interviewmarking";
					$value = " `in_comid`, `in_canid`, `in_assmid`, `in_quesid`, `in_ratings`, `in_feedback`, `in_action`, `in_interviewby`, `in_takendate`, `in_status ";
					$data = " '$comid', '$canid', '$assetid','$quesid[$i]', '$range[$i]', '$content[$i]', 'Rejected', '$empid','1' ";
					
					$fun = new Functions();
					$fun->insertData($table, $value, $data);
				}
				
				$table = "in_candidates";
				$data = " `in_interviewsatus`= 'Rejected in Last Round' ";
				$cond = " in_sno='$canid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);

				$table = "in_interviews";
				$data = " `in_roundstatus`= 'Rejected', `in_comment`='$intifeedback' ";
				$cond = " in_sno='$srid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);
			}
		}
		else
		{
			if($recommend == "Yes")
			{
				for($i=0;$i<$qyes;$i++)
				{
					$table = "in_interviewmarking";
					$value = " `in_comid`, `in_canid`, `in_assmid`, `in_quesid`, `in_ratings`, `in_feedback`, `in_action`, `in_interviewby`, `in_takendate`, `in_status ";
					$data = " '$comid', '$canid', '$assetid','$quesid[$i]', '$range[$i]', '$content[$i]', 'Selected', '$empid','1' ";
					
					$fun = new Functions();
					$fun->insertData($table, $value, $data);
				}
				

				$table = "in_candidates";
				$data = " `in_interviewsatus`= 'Selected in $pround Round' ";
				$cond = " in_sno='$canid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);

				$table = "in_interviews";
				$data = " `in_roundstatus`= 'Selected', `in_comment`='$intifeedback' ";
				$cond = " in_sno='$srid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);
			}
			else
			{
				for($i=0;$i<$qyes;$i++)
				{
					$table = "in_interviewmarking";
					$value = " `in_comid`, `in_canid`, `in_assmid`, `in_quesid`, `in_ratings`, `in_feedback`, `in_action`, `in_interviewby`, `in_takendate`, `in_status ";
					$data = " '$comid', '$canid', '$assetid','$quesid[$i]', '$range[$i]', '$content[$i]', 'Rejected', '$empid','1' ";
					
					$fun = new Functions();
					$fun->insertData($table, $value, $data);
				}
				
				$table = "in_candidates";
				$data = " `in_interviewsatus`= 'Rejected in $pround Round' ";
				$cond = " in_sno='$canid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);

				$table = "in_interviews";
				$data = " `in_roundstatus`= 'Rejected', `in_comment`='$intifeedback' ";
				$cond = " in_sno='$srid' ";
				$fun = new Functions();
				$fun->updateCond($table,$data,$cond);
			}
		}

		
		
		header("Location:".VIEW."recruitment/interviews.php?case=save");
		break;
		case "negotiation":
		$canid = $_POST['canid'];
		$offer = $_POST['offer'];
		$hrid = $_POST['hrid'];
		$jobtitle = $_POST['jobtitle'];
		$comment = $_POST['comment'];

		$table = "in_hrperformance";
		$value = " `in_comid`, `in_hrempid`, `in_jobtitle`, `in_canid`, `in_selection`, `in_date`, `in_status` ";
		$data = " '$comid', '$hrid', '$jobtitle', '$canid', '$offer', now(), '1' ";
		$fun = new Functions();
		$fun->insertData($table, $value, $data);

		$table = "in_candidates";
		$data = " `in_negoround`= '$offer', `in_negofeedback`='$comment' ";
		$cond = " in_sno='$canid' ";
		$fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/onboarding.php?case=save");
		break;
		case "jobpostpublish";
        $jugid = $_GET['id'];
        $table = "in_jobapplication";
        $data = " in_publish='1' ";
        $cond = " in_sno='$jugid' ";
        $fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/job-openings.php?case=save");
        break;
        case "jobpostunpublish";
        $jugid = $_GET['id'];
        $table = "in_jobapplication";
        $data = " in_publish='0' ";
        $cond = " in_sno='$jugid' ";
        $fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/job-openings.php?case=save");
        break;
        case "jobpostdelete";
        $jugid = $_GET['id'];
        $table = "in_jobapplication";
        $data = " in_status='0' ";
        $cond = " in_sno='$jugid' ";
        $fun = new Functions();
		$fun->updateCond($table,$data,$cond);
		header("Location:".VIEW."recruitment/job-openings.php?case=save");
        break;
		case "joiningemail":
			$canid = $_POST['canid'];
			$useremail = $_POST['useremail'];
			$tenth = isset($_POST['tenth']) ? "1":"0";
			$twelfth = isset($_POST['twelfth']) ? "1":"0";
			$graduation = isset($_POST['graduation']) ? "1":"0";
			$postgraduation = isset($_POST['postgraduation']) ? "1":"0";
			$service = isset($_POST['service']) ? "1":"0";
			$banksta = isset($_POST['bankstatement']) ? "1":"0";
			$pancard = isset($_POST['pancard']) ? "1":"0";
			$adharcard = isset($_POST['adharcard']) ? "1":"0";
			$photographs = isset($_POST['photographs']) ? "1":"0";
			$voterlicence = isset($_POST['voterlicence']) ? "1":"0";
			
			$contents = $_POST['contents'];
			$contents = str_replace("'", "\'", $contents);
			


			$table = "in_candidatedocs";
			$value = "  `in_comid`, `in_canid`, `in_tenth_cert`, `in_thenth_marks`, `in_twelth_cert`, `in_twelth_marks`, `in_gradu_cert`, `in_gradu_marks`, `in_post_cert`, `in_post_marks`, `in_service`, `in_statement`, `in_pancard`, `in_adharcard`, `in_photographs`, `in_votercard`, `in_others`, `in_sentby`, `in_mailsentdate`, `in_status` ";
			$data = " '$comid', '$canid', '$tenth', '$tenth', '$twelfth', '$twelfth', '$graduation','$graduation', '$postgraduation', '$postgraduation', '$service', '$banksta', '$pancard', '$adharcard', '$photographs', '$voterlicence', '', '$empid', '$fdate',  '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);

			$table = "in_candidates";
			$data = " in_emailconfirm='1' ";
			$cond = " in_sno='$canid' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);

			$to = $useremail;
			$subject = "Joining Confirmation Mail";
			$txt = $contents;
			$headers = "From: hr@inoday.com" . "\r\n" .
			"CC: dilip.kumar@inoday.com";

			$sendmail = mail($to,$subject,$txt,$headers);
			if($sendmail == true)
			{
				header("Location:".VIEW."recruitment/outstading-offer.php?case=save");
			}
			else
			{
				header("Location:".VIEW."recruitment/outstading-offer.php?case=err");
			}

		break;



	}

}