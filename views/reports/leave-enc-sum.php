<?php
header("Content-Type: application/vnd.ms-excel"); 
$fileName = "employee_data" . date('Ymd') . ".xlsx"; 
header("Content-Disposition: attachment; filename=\"$fileName\""); 

$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/core/core.php';

?>
<table border="1">

    <thead>

      <th>No</th>

      <th>Employee ID</th>

      <th>Employee Name</th>
      <th>Joining Date</th>
      <th>Designation</th>
      <th>Department</th>
      <th>Email Address</th>

      <th>Mobile Number</th>

      <th>Reporting Manager</th>
      <th>Status</th>


      

    </thead>

    <tbody>

      <?php

      $table = "in_employee";
      $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY `in_empid` ASC ";

      $select = new Selectall();

      $res = $select->getallCond($table,$cond);

        $xl =1;
        foreach($res as $rs)

        {

          $design = $rs['in_designation'];

          $table = "in_master_card";
          $cond = " `in_sno`='$design' ";
          $select = new Selectall();
          $desi = $select->getcondData($table,$cond);
          if($desi != "")
          {
            $dmast = $desi['in_relation'];
          }

          $dept = $rs['in_department'];

          $table = "in_master_card";
          $cond = " `in_sno`='$dept' ";
          $select = new Selectall();
          $depts = $select->getcondData($table,$cond);
          if($depts != "")
          {
            $dpval = $depts['in_prefix'];
          }

          $rept = $rs['in_reporting'];

          $table = "in_employee";
          $cond = " `in_empid`='$rept' ";
          $select = new Selectall();
          $empt = $select->getcondData($table,$cond);
          if($empt != "")
          {
            $remon = $empt['in_fname']." ".$empt['in_lname'];
          }

          $rno = $rs['in_emprefix'];

          $table = "in_master_card";
          $cond = " `in_sno`='$rno'";
          $select = new Selectall();
          $pres = $select->getcondData($table,$cond);
          if($pres != "")
          {
            $prefix = $pres['in_prefix'];
          }
          

          ?>

          <tr>

          <td><?php echo $xl;?></td>

          <td><?php echo $prefix.$rs['in_empid'];?></td>

          <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>
          <td><?php echo date('d-m-Y', strtotime($rs['in_dateofjoining']));?></td>
          <td><?php

            
            if($dmast == "masterDesignation")
            {
              echo "<span>M</span> ".$desi['in_prefix'];
            }
            else
            {
              echo $desi['in_prefix'];
            }
           

          ?></td>
          <td><?php echo $dpval;?></td>
          <td><?php echo $rs['in_email'];?></td>

          

          <td><?php echo $rs['in_mobileno'];?></td>
          <td><?php echo $remon;?></td>
          <td><?php echo "Active";?></td>

        </tr>

          <?php

          $xl++;

        }

      ?>

    </tbody>

  </table>