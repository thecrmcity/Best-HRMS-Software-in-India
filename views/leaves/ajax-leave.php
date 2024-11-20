<?php

if(!defined('BSPATH'))

{

	$bspath = dirname(dirname((__DIR__)));

	include_once $bspath.'/core/core.php';

}


if(isset($_GET['labal']))
{
	$labal = $_GET['labal'];
	$table = "in_leavebalance";
  $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_leaveid`='$labal' ORDER BY in_sno DESC";
  $select = new Selectall();
  $levbal = $select->getcondData($table,$cond);
  if($levbal != "")
  {
    echo $levbal['in_balance'];
  }
}


if(isset($_GET['case']))
{
	$case = $_GET['case'];
	$id = $_GET['id'];
	switch($case)
	{
		case "designation":
		$xl=1;
        $table = "in_employee";
        $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_designation`='$id' ORDER BY in_empid ASC";
        $select = new Selectall();
        $canemp = $select->getallCond($table,$cond);
        if(!empty($canemp))
        {
          foreach($canemp as $can)
          {

            ?>
            <tr>
              <td><?php echo $xl;?></td>
              <td><?php echo $can['in_empid'];?></td>
              <td><?php echo $can['in_fname']." ".$can['in_lname'];?></td>
              <td><?php echo $can['in_designation'];?></td>
              <td><?php echo $can['in_department'];?></td>
              <td><input type="checkbox" name="cantrash[]" value="<?php echo $can['in_empid']?>" class="chk_me"></td>
            </tr>
            <?php
            $xl++;
          }
        }
        else
        {
        	?>
        	<tr>
        		<td colspan="6" class="text-center">No Data</td>
        	</tr>
        	<?php
        }
		break;
		case "department":
		$xl=1;
        $table = "in_employee";
        $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_department`='$id' ORDER BY in_empid ASC";
        $select = new Selectall();
        $canemp = $select->getallCond($table,$cond);
        if(!empty($canemp))
        {
          foreach($canemp as $can)
          {

            ?>
            <tr>
              <td><?php echo $xl;?></td>
              <td><?php echo $can['in_empid'];?></td>
              <td><?php echo $can['in_fname']." ".$can['in_lname'];?></td>
              <td><?php echo $can['in_designation'];?></td>
              <td><?php echo $can['in_department'];?></td>
              <td><input type="checkbox" name="cantrash[]" value="<?php echo $can['in_empid']?>" class="chk_me"></td>
            </tr>
            <?php
            $xl++;
          }
        }
        else
        {
        	?>
        	<tr>
        		<td colspan="6" class="text-center">No Data</td>
        	</tr>
        	<?php
        }
		break;
		case "allemployee":
		$xl=1;
        $table = "in_employee";
        $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY in_empid ASC";
        $select = new Selectall();
        $canemp = $select->getallCond($table,$cond);
        if(!empty($canemp))
        {
          foreach($canemp as $can)
          {

            ?>
            <tr>
              <td><?php echo $xl;?></td>
              <td><?php echo $can['in_empid'];?></td>
              <td><?php echo $can['in_fname']." ".$can['in_lname'];?></td>
              <td><?php echo $can['in_designation'];?></td>
              <td><?php echo $can['in_department'];?></td>
              <td><input type="checkbox" name="cantrash[]" value="<?php echo $can['in_empid']?>" class="chk_me"></td>
            </tr>
            <?php
            $xl++;
          }
        }
        else
        {
        	?>
        	<tr>
        		<td colspan="6" class="text-center">No Data</td>
        	</tr>
        	<?php
        }
		break;
	}
}

if(isset($_GET['start']))
{
	$startdate = $_GET['start'];
	$startday = $_GET['srtsort'];
	$enddate = $_GET['enden'];
	$endday = $_GET['endsort'];


	if($enddate != "")
	{
		$date1=date_create($startdate);
		$date2=date_create($enddate);
		$diff=date_diff($date1,$date2);
		$lday = $diff->format("%R%a");


		$lday = $lday + 1;
		
		if($startday == "full_day" && $endday == "full_day")
		{
			$leavday = $lday;
		}
		else if($startday == "half_day" && $endday == "half_day"){
			$leavday = ($lday-1);
		}
		else if($startday == "full_day" && $endday == "half_day"){
			$leavday = ($lday-0.5);
		}
		else if($startday == "half_day" && $endday == "full_day"){
			$leavday = ($lday-0.5);
		}
		
		echo $leavday;
		
	}
	else
	{
		$lday = $lday+1;
		if($startday == "full_day" && $endday == "full_day")
		{
			$leavday = $lday;
		}
		else if($startday == "half_day" && $endday == "half_day"){
			$leavday = ($lday-1);
		}
		else if($startday == "full_day" && $endday == "half_day"){
			$leavday = ($lday-0.5);
		}
		else if($startday == "half_day" && $endday == "full_day"){
			$leavday = ($lday-0.5);
		}
		echo $leavday;
	}
}

?>