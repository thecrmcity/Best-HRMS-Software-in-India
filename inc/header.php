<?php

$bsurl = dirname(__DIR__);

include_once $bsurl.'/core/core.php';


if(!isset($_SESSION['pemail']))

{

  header('Location:'.BSURL.'index.php');
  session_destroy();

}

?>



<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard | Employee Management Systems</title>

  <?php

    $id = $comid;

    $select = new Selectall();

    $setting = $select->compInfo($id);

    if($setting != "")

    {

      ?>

      <link rel="icon" type="image/x-icon" href="<?php echo BSURL;?>uploads/<?php echo $setting['in_fevicon'];?>">

      <?php

    }

    else

    {

      ?>

      <link rel="icon" type="image/x-icon" href="<?php echo BSURL;?>uploads/fevicon.png">

      <?php

    }

  ?>

  

  <?php $core->getHeader();?>

</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="getLocation()">

<div class="wrapper">

<?php

  $id = $comid;

  $select = new Selectall();

  $fevi = $select->companyInfo($id);

  

  if($fevi != "")

  {

    $comfevi = $fevi['in_fevicon'];

    $comptlo = $fevi['in_logo'];

    $comfevis = BSURL."uploads/".$comfevi;

    $comlogo = BSURL."uploads/".$comptlo;

  }

  else

  {

    

    $comfevis = BSURL."assets/dist/img/AdminLTELogo.png";

  }

?>

  <!-- Preloader -->

  <div class="preloader flex-column justify-content-center align-items-center">



    <img class="" src="<?php echo $comlogo;?>" alt="CRMLogo" height="50" width="100">

  </div>



  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>

      

    </ul>

    <?php



    ?>

    <marquee class="topevent">

      <ul class="navbar-nav">

        <?php

        $dash = new Dashboard();

        $birthday = $dash->birthDay();

        if(!empty($birthday))

        {

          ?>

          <li class="nav-item"><span class="nav-link text-white"><small class="blinker"><i class="fas fa-gift"></i> Birthday</small></span></li>

          <?php

          foreach($birthday as $birth)

          {

            $birthd = $birth['birthdate'];

            $bname = $birth['fulname'];

            $age = $core->getAge($birthd);

            if($age != "")

            {

              

              ?>

              <li class="nav-item"><span class="nav-link"><small><?php echo $bname; ?></small></span></li>

              <?php

            }

          }

          

        }

        $dash = new Dashboard();

        $joiner = $dash->aniveSary();

        

        // print_r($joiner);

        if(!empty($joiner))

        {

          ?>

          <li class="nav-item"><span class="nav-link text-white"><small class="blinker"><i class="fas fa-suitcase"></i> Anniversary</small></span></li>

          <?php

         foreach($joiner as $join)

         {

          $joit = $join['joindate'];

          $names = $join['fulname'];

          $age = $core->getAge($joit);

          if($age != "")

          {

            

          if($age > 1)
            {
              ?>

           <li class="nav-item"><span class="nav-link"><small><?php echo $names." (".$age." Years)"; ?></small></span></li>

           <?php
            }
            else
            {
              ?>

           <li class="nav-item"><span class="nav-link"><small><?php echo $names." (".$age." Year)"; ?></small></span></li>

           <?php
            }

            

          }

         }

          

        }

        ?>

        

        

      </ul>

    </marquee>



    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">

      

      <?php

      $table = "in_notice";

      $cond = " `in_active`='publish' ";

      $select = new Selectall();

      $palData = $select->getallCond($table, $cond);

      if(!empty($palData))

      {

        $palcont = count($palData);

        $paltime = @$palData['in_modified'];

        $stime = strtotime($paltime);

        $ptime = $stime - (5 * 60);

        $mtime = date('H:i:s', $ptime);



      }

      else

      {

        $palcont = "0";

        $mtime = "00:00:00";

      }

      ?>

      

      <!-- Notifications Dropdown Menu -->

      <?php

      if(!isset($_SESSION['adminemail']))

      {

        $select = new Selectall();

        $rest = $select->checkPass();

        if($rest <=5)

        {

          ?>

          <li class="nav-item"><a href="<?php echo VIEW?>password" class="nav-link passblink"><i class="fas fa-lock"></i></a></li>

          <?php

        }

      }

      

      ?>

      

      <li class="nav-item dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#">

          <i class="far fa-bell"></i>

          <span class="badge badge-warning navbar-badge"><?php echo $palcont;?></span>

        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <span class="dropdown-item dropdown-header"><?php echo $palcont;?> Notifications</span>

          <div class="dropdown-divider"></div>

          <a href="<?php echo VIEW;?>notice/site-notice.php" class="dropdown-item">

            <i class="fas fa-bell mr-2"></i> <?php echo $palcont;?> new messages

            <span class="float-right text-muted text-sm"><?php echo $mtime;?></span>

          </a>

          

          <div class="dropdown-divider"></div>

          <a href="<?php echo VIEW;?>notice/site-notice.php" class="dropdown-item dropdown-footer">See All Notifications</a>

        </div>

      </li>

      <!-- <li class="nav-item">

        <a class="nav-link" data-widget="fullscreen" href="#" role="button">

          <i class="fas fa-expand-arrows-alt"></i>

        </a>

      </li> -->

      <li class="nav-item dropdown">

        <a class="nav-link" data-toggle="dropdown" href="">

          <i class="fas fa-user-tie"></i> <span class="dname"><?php echo $fullname;?></span>

        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <span class="dropdown-item dropdown-header bg-secondary"><?php 

          $table = "in_master_card";

          $cond = " `in_sno`='$desig' ";

          $select = new Selectall();

          $desi = $select->getcondData($table,$cond);

          if($desi != "")

          {

            echo @$desi['in_prefix'];

          }

          else

          {

            echo "SuperAdmin";

          }

          



          ?></span>

          <div class="dropdown-divider"></div>

          <?php

          if(isset($adminemail) && !isset($pemail))

            {

             

              ?>

              <a href="<?php echo VIEW;?>employee/manage-employee.php" class="dropdown-item"><i class="fas fa-user mr-2"></i> Profile</a>

              <div class="dropdown-divider"></div>

                <a href="<?php echo VIEW;?>password/admin-password.php" class="dropdown-item">

                  <i class="fas fa-lock mr-2"></i> Password

                  

                </a>

              <?php

            }

            else

            {

              ?>

              <a href="<?php echo VIEW;?>profile" class="dropdown-item"><i class="fas fa-user mr-2"></i> Profile</a>

              <div class="dropdown-divider"></div>

          <a href="<?php echo VIEW;?>password" class="dropdown-item">

            <i class="fas fa-lock mr-2"></i> Password

            

          </a>

              <?php

            }

          ?>

         

          

          <?php

          if(isset($adminemail) && !isset($pemail))

          {

            ?>

            <div class="dropdown-divider"></div>

          <a href="<?php echo VIEW;?>sqlquery" class="dropdown-item">

            <i class="fas fa-database mr-2"></i> SQL Query

            

          </a>





            <?php

          }

          if(!isset($adminemail))

          {



              $table = "in_employee";

              $cond = " `in_empid`='$empid' ";

              $sel = new Selectall();

              $sp = $sel->getcondData($table,$cond);

              $spcom = $sp['in_multicom'];

              if($spcom != "")

              {

                ?>

                <div class="dropdown-divider"></div>

          <a href="<?php echo BSURL;?>functions/logout.php" class="dropdown-item dropdown-toggle" data-toggle="dropdown">

            <i class="fas fa-industry mr-2"></i> Switch Company

            

          </a>

          <div class="dropdown-menu dropdown-menu-lg bg-faded">

                <?php

                $comp = explode(";", $spcom);



                if(!empty($comp))

                {

                  $i = 0;

                  foreach($comp as $cm)

                  {



                    $table = "in_master_card";

                    $cond = " `in_sno`='$cm' ";

                    $sel = new Selectall();

                    $mp = $sel->getcondData($table,$cond);

                    ?>

                    <a class="dropdown-item" href="<?php echo BSURL;?>core/setup.php?cmid=<?php echo $mp['in_sno'];?>"><i class="fas fa-industry"></i> <?php echo $mp['in_prefix'];?></a>

                    <div class="dropdown-divider"></div>

                    <?php

                    $i++;

                  }

                }

                ?>

                </div>

                <?php

              }

              

            

          }



          ?>

          

          

          

            

          

          

          <div class="dropdown-divider"></div>

          <a href="<?php echo BSURL;?>functions/logout.php" class="dropdown-item bg-light">

            <i class="fas fa-power-off mr-2"></i> Logout

            

          </a>



          

        </div>

      </li>

    </ul>

  </nav>

  <!-- /.navbar -->