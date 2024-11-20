<?php
if(!defined('BSPATH'))
{
	$bspath = dirname((__DIR__));
	include_once $bspath.'/core/core.php';

}
		$headn = "";
		$slnod = "";
		$fnamed = "";
		$lnamed = "";
		$fthnamed = "";
		$comemaild = "";
		$peremaild = "";
		$dobd = "";
		$pmobiled = "";
		$genderd = "";
		$maritald = "";
		$departd = "";
		$desigd = "";
		$dojd = "";
		$managerd = "";
		$acholderd = "";
		$acnumberd = "";
		$bankd = "";
		$branchd = "";
		$ifscd = "";
		$salaryd = "";
		$payscaled = "";
		$pannod = "";
		$tdsd = "";
		$pfd = "";
		$pfnod = "";
		$pfdated = "";
		$esid = "";
		$esinod = "";
		$esidated = "";

		$sqlqury = "";
		$sqldata = "";



		
		$filename = $_FILES['uploademp']['name'];
		$filetemp = $_FILES['uploademp']['tmp_name'];

		$ext=pathinfo($_FILES['uploademp']['name'],PATHINFO_EXTENSION);
		if($ext=='xlsx')
		{
			include_once 'PHPExcel/PHPExcel.php';
			include_once 'PHPExcel/PHPExcel/IOFactory.php';

			$objExcel = PHPExcel_IOFactory::load($filetemp);
			
			foreach($objExcel->getWorksheetIterator() as $worksheet)
			{
				$hrow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
			    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			    // for ($col = 1; $col < $highestColumnIndex; $col++) {
			    //     $heading = $worksheet->getCellByColumnAndRow($col, '2')->getValue();
			    //     $headn .= $heading . ",";

			        
			        
			    // 	}
				// $headto = explode(",",$headn);
				// echo $worksheet->getCellByColumnAndRow('0','2')->getValue();
				
				for($row=2;$row<=$hrow;$row++)
				{
					
					$slno = $worksheet->getCellByColumnAndRow('0',$row)->getValue();
					$fname = $worksheet->getCellByColumnAndRow('1',$row)->getValue();
					$lname = $worksheet->getCellByColumnAndRow('2',$row)->getValue();
					$fthname = $worksheet->getCellByColumnAndRow('3',$row)->getValue();
					$comemail = $worksheet->getCellByColumnAndRow('4',$row)->getValue();
					$peremail = $worksheet->getCellByColumnAndRow('5',$row)->getValue();
					$dob = $worksheet->getCellByColumnAndRow('6',$row)->getValue();
					$pmobile = $worksheet->getCellByColumnAndRow('7',$row)->getValue();
					$gender = $worksheet->getCellByColumnAndRow('8',$row)->getValue();
					$marital = $worksheet->getCellByColumnAndRow('9',$row)->getValue();
					$depart = $worksheet->getCellByColumnAndRow('10',$row)->getValue();
					$desig = $worksheet->getCellByColumnAndRow('11',$row)->getValue();
					$doj = $worksheet->getCellByColumnAndRow('12',$row)->getValue();
					$manager = $worksheet->getCellByColumnAndRow('13',$row)->getValue();
					$acholder = $worksheet->getCellByColumnAndRow('14',$row)->getValue();
					$acnumber = $worksheet->getCellByColumnAndRow('15',$row)->getValue();
					$bank = $worksheet->getCellByColumnAndRow('16',$row)->getValue();
					$branch = $worksheet->getCellByColumnAndRow('17',$row)->getValue();
					$ifsc = $worksheet->getCellByColumnAndRow('18',$row)->getValue();
					$salary = $worksheet->getCellByColumnAndRow('19',$row)->getValue();
					$payscale = $worksheet->getCellByColumnAndRow('20',$row)->getValue();
					$panno = $worksheet->getCellByColumnAndRow('21',$row)->getValue();
					$tds = $worksheet->getCellByColumnAndRow('22',$row)->getValue();
					$pf = $worksheet->getCellByColumnAndRow('23',$row)->getValue();
					$pfno = $worksheet->getCellByColumnAndRow('24',$row)->getValue();
					$pfdate = $worksheet->getCellByColumnAndRow('25',$row)->getValue();
					$esi = $worksheet->getCellByColumnAndRow('26',$row)->getValue();
					$esino = $worksheet->getCellByColumnAndRow('27',$row)->getValue();
					$esidate = $worksheet->getCellByColumnAndRow('28',$row)->getValue();

					$slnod .= $slno.",";
					$fnamed .= $fname.",";
					$lnamed .= $lname.",";
					$fthnamed .= $fthname.",";
					$comemaild .= $comemail.",";
					$peremaild .= $peremail.",";
					$dobd .= $dob.",";
					$pmobiled .= $pmobile.",";
					$genderd .= $gender.",";
					$maritald .= $marital.",";
					$departd .= $depart.",";
					$desigd .= $desig.",";
					$dojd .= $doj.",";
					$managerd .= $manager.",";
					$acholderd .= $acholder.",";
					$acnumberd .= $acnumber.",";
					$bankd .= $bank.",";
					$branchd .= $branch.",";
					$ifscd .= $ifsc.",";
					$salaryd .= $salary.",";
					$payscaled .= $payscale.",";
					$pannod .= $panno.",";
					$tdsd .= $tds.",";
					$pfd .= $pf.",";
					$pfnod .= $pfno.",";
					$pfdated .= $pfdate.",";
					$esid .= $esi.",";
					$esinod .= $esino.",";
					$esidated .= $esidate.",";															


				}
				$slnode = explode(",",$slnod);
				$fnamede = explode(",",$fnamed);
				$lnamede = explode(",",$lnamed);
				$fthnamede = explode(",",$fthnamed);
				$comemailde = explode(",",$comemaild);
				$peremailde = explode(",",$peremaild);
				$dobde = explode(",",$dobd);
				$pmobilede = explode(",",$pmobiled);
				$genderde = explode(",",$genderd);
				$maritalde = explode(",",$maritald);
				$departde = explode(",",$departd);
				$desigde = explode(",",$desigd);
				$dojde = explode(",",$dojd);
				$managerde = explode(",",$managerd);
				$acholderde = explode(",",$acholderd);
				$acnumberde = explode(",",$acnumberd);
				$bankde = explode(",",$bankd);
				$branchde = explode(",",$branchd);
				$ifscde = explode(",",$ifscd);
				$salaryde = explode(",",$salaryd);
				$payscalede = explode(",",$payscaled);
				$pannode = explode(",",$pannod);
				$tdsde = explode(",",$tdsd);
				$pfde = explode(",",$pfd);
				$pfnode = explode(",",$pfnod);
				$pfdatede = explode(",",$pfdated);
				$eside = explode(",",$esid);
				$esinode = explode(",",$esinod);
				$esidatede = explode(",",$esidated);

				for($row=3;$row<=$hrow;$row++)
				{
					
					
					$fnamem = $worksheet->getCellByColumnAndRow('1',$row)->getValue();
					$lnamem = $worksheet->getCellByColumnAndRow('2',$row)->getValue();
					$fthnamem = $worksheet->getCellByColumnAndRow('3',$row)->getValue();
					$comemailm = $worksheet->getCellByColumnAndRow('4',$row)->getValue();
					$peremailm = $worksheet->getCellByColumnAndRow('5',$row)->getValue();
					$dobm = $worksheet->getCellByColumnAndRow('6',$row)->getValue();
					$pmobilem = $worksheet->getCellByColumnAndRow('7',$row)->getValue();
					$genderm = $worksheet->getCellByColumnAndRow('8',$row)->getValue();
					$maritalm = $worksheet->getCellByColumnAndRow('9',$row)->getValue();
					$departm = $worksheet->getCellByColumnAndRow('10',$row)->getValue();
					$desigm = $worksheet->getCellByColumnAndRow('11',$row)->getValue();
					$dojm = $worksheet->getCellByColumnAndRow('12',$row)->getValue();
					$managerm = $worksheet->getCellByColumnAndRow('13',$row)->getValue();
					$acholderm = $worksheet->getCellByColumnAndRow('14',$row)->getValue();
					$acnumberm = $worksheet->getCellByColumnAndRow('15',$row)->getValue();
					$bankm = $worksheet->getCellByColumnAndRow('16',$row)->getValue();
					$branchm = $worksheet->getCellByColumnAndRow('17',$row)->getValue();
					$ifscm = $worksheet->getCellByColumnAndRow('18',$row)->getValue();
					$salarym = $worksheet->getCellByColumnAndRow('19',$row)->getValue();
					$payscalem = $worksheet->getCellByColumnAndRow('20',$row)->getValue();
					$pannom = $worksheet->getCellByColumnAndRow('21',$row)->getValue();
					$tdsm = $worksheet->getCellByColumnAndRow('22',$row)->getValue();
					$pfm = $worksheet->getCellByColumnAndRow('23',$row)->getValue();
					$pfnom = $worksheet->getCellByColumnAndRow('24',$row)->getValue();
					$pfdatem = $worksheet->getCellByColumnAndRow('25',$row)->getValue();
					$esim = $worksheet->getCellByColumnAndRow('26',$row)->getValue();
					$esinom = $worksheet->getCellByColumnAndRow('27',$row)->getValue();
					$esidatem = $worksheet->getCellByColumnAndRow('28',$row)->getValue();

					
					if($lnamem != "")
					{
						$fullnam = $fnamem.$lnamem;
						$fullnaam = strtolower(str_replace(" ", "",$fullnam));
					}
					else
					{
						$fullnam = $fnamem.$pmobilem;
						$fullnaam = strtolower(str_replace(" ", "",$fullnam));
					}

					if($fnamede[0] == "FirstName")
					{
						$sqlqury .= "INSERT INTO `in_employee`(`in_groupid`, `in_fname`,";
						$sqldata .= "VALUES ('2', '$fnamem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($lnamede[0] == "LastName")
					{
						$sqlqury .= " `in_lname`,";
						$sqldata .= " '$lnamem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($comemailde[0] == "CompanyEmail")
					{
						$sqlqury .= " `in_email`,";
						$sqldata .= " '$comemailm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($peremailde[0] == "PersonalEmail")
					{
						$sqlqury .= " `in_pemail`, `in_username`, `in_delete`, `in_createdon`,";
						$sqldata .= " '$peremailm', '$fullnaam', '1', '$fdate',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($managerde[0] == "Manager")
					{
						$sqlqury .= " `in_reporting`,";
						$sqldata .= " '$managerm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($desigde[0] == "Designation")
					{
						$sqlqury .= " `in_designation`,";
						$sqldata .= " '$desigm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($pmobilede[0] == "Mobile")
					{
						$sqlqury .= " `in_mobileno`,";
						$sqldata .= " '$pmobilem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($fthnamede[0] == "FatherName")
					{
						$sqlqury .= " `in_fathernam`,";
						$sqldata .= " '$fthnamem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($dobde[0] == "Birthdate")
					{
						$sqlqury .= " `in_dateofbirth`,";
						$sqldata .= " '$dobm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($genderde[0] == "Gender")
					{
						$sqlqury .= " `in_gender`,";
						$sqldata .= " '$genderm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($maritalde[0] == "MaritalStatus")
					{
						$sqlqury .= " `in_marital`,";
						$sqldata .= " '$maritalm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($departde[0] == "Department")
					{
						$sqlqury .= " `in_department`,";
						$sqldata .= " '$departm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($dojde[0] == "JoiningDate")
					{
						$sqlqury .= " `in_dateofjoining`,";
						$sqldata .= " '$dojm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					

					$table = "in_companyinfo";
					$cond = " `in_status`='1' ";
					$select = new Selectall();
					$seData = $select->getcondData($table,$cond);
					$selprobat = $seData['in_probation'];

					$sqlqury .= " `in_probation`,";
					$sqldata .= " '$selprobat',";

					if($salaryde[0] == "Salary")
					{
						$sqlqury .= " `in_salary`,";
						$sqldata .= " '$salarym',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($payscalede[0] == "Payscale")
					{
						$sqlqury .= " `in_payscale`,";
						$sqldata .= " '$payscalem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($pannode[0] == "PAN_No")
					{
						$sqlqury .= " `in_panno`,";
						$sqldata .= " '$pannom',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($tdsde[0] == "TDS")
					{
						$sqlqury .= " `in_tds`,";
						$sqldata .= " '$tdsm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($pfde[0] == "PF")
					{
						$sqlqury .= " `in_pfaccess`,";
						$sqldata .= " '$pfm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($pfnode[0] == "PF_No")
					{
						$sqlqury .= " `in_pfnumber`,";
						$sqldata .= " '$pfnom',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($pfdatede[0] == "PFEffective")
					{
						$sqlqury .= " `in_pfeffective`,";
						$sqldata .= " '$pfdatem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($eside[0] == "ESI")
					{
						$sqlqury .= " `in_esiaccess`,";
						$sqldata .= " '$esim',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($esinode[0] == "ESI_No")
					{
						$sqlqury .= " `in_esinumber`,";
						$sqldata .= " '$esinom',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($esidatede[0] == "ESIEffective")
					{
						$sqlqury .= " `in_esiceffective`,";
						$sqldata .= " '$esidatem',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($acholderde[0] == "AccountHolder")
					{
						$sqlqury .= " `in_holder`,";
						$sqldata .= " '$acholderm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($acnumberde[0] == "AccountNo")
					{
						$sqlqury .= " `in_acnumber`,";
						$sqldata .= " '$acnumberm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($bankde[0] == "BankName")
					{
						$sqlqury .= " `in_bankname`,";
						$sqldata .= " '$bankm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($branchde[0] == "BankBranch")
					{
						$sqlqury .= " `in_branch`,";
						$sqldata .= " '$branchm',";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}
					if($ifscde[0] == "IFSC")
					{
						$sqlqury .= " `in_ifcscode`) ";
						$sqldata .= " '$ifscm'); ";
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=filehead");
					}

					$db = new Database();
					$sql = $sqlqury.$sqldata;
					
					
					
					$res = mysqli_query($db->conn,$sql);
					if($res == true)
					{
						header("Location:".VIEW."employee/manage-employee.php?case=save");
					}
					else
					{
						header("Location:".VIEW."employee/upload-employee.php?case=uexist");
					}

					$sqlqury = "";
					$sqldata = "";

					

					

				}
				
				


				
				
			}
			
			
		}
		else
		{
			header("Location:".VIEW."employee/upload-employee.php?case=filerr");
		}