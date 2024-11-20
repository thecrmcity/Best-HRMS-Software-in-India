<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';

include_once $bsurl.'/inc/sidebar.php';



?>



  



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper mainbody">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h4 class="m-0"><?php echo ucwords($sitename);?></h4>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="card rounded-0">

            <div class="card-header">

              <div class="card-title">

                <form class="" method="GET">

                  <div class="input-group">

                      

                      <?php

                        if(isset($_GET['brand']))

                        {

                          $br = $_GET['brand'];

                          $table = "in_super_card";

                          $cond = " `in_sno`='$br' ";

                          $select = new Selectall();

                          $mods = $select->getcondData($table,$cond);

                          $mnid = $mods['in_sno'];

                          $selDo = $mods['in_cardname'];

                        }

                        else

                        {

                          $mnid = "";

                          $selDo = "--Select--";

                        }

                      ?>

                      <select class=" rounded-0 form-control" name="brand" required>

                        <option value="<?php echo $mnid;?>"><?php echo $selDo;?></option>

                        <?php

                          $table = "in_super_card";

                          $cond = " in_cardrelation='majorcard' ";

                          $select = new Selectall();

                          $mod = $select->getallCond($table,$cond);

                          foreach($mod as $md)

                          {

                            ?>

                            <option value="<?php echo $md['in_sno'];?>"><?php echo $md['in_cardname'];?></option>

                            <?php

                          }

                        ?>

                      </select>

                      <div class="input-group-append">

                        <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>

                      </div>

                    </div>

                </form>

              </div>

              <div class="card-tools">

                <a href="developer-setup.php" class="form-control"><i class="fas fa-fire-alt"></i><b> Developer Setup </b></a>

              </div>

            </div>

            

          <?php

          if(isset($_GET['brand']))

          {

            $slug = array();

            $id = $_GET['brand'];

            $sel = new Selectall();

            

            

            ?>

            <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=controller&id=<?php echo $id;?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">

          <div class="card-body">

            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-cogs"> </i> Global Setting</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      <tr>

                        <td>Master Setup</td>

                        <?php

                        $val = 'masterSetup';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                         <input type="hidden" name="masterSetup" value="0">

                      <input type="checkbox" class="custom-control-input" id="masterSetup" name="masterSetup" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="masterSetup"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td>Company Creation</td>

                        <?php

                        $val = 'companyCreate';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="companyCreate" value="0">

                      <input type="checkbox" class="custom-control-input" id="companyCreate" name="companyCreate" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="companyCreate"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td>Add Company Details</td>

                        <?php

                        $val = 'comDetails';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="comDetails" value="0">

                      <input type="checkbox" class="custom-control-input" id="comDetails" name="comDetails" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="comDetails"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td>Week Off Controls</td>

                        <?php

                        $val = 'weekOff';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="weekOff" value="0">

                      <input type="checkbox" class="custom-control-input" id="weekOff" name="weekOff" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="weekOff"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td>Classification Access</td>

                        <?php

                        $val = 'classicAccess';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="classicAccess" value="0">

                      <input type="checkbox" class="custom-control-input" id="classicAccess" name="classicAccess" value="classicAccess" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="classicAccess"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td>Master Card Access</td>

                        <?php

                        $val = 'masterCard';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="masterCard" value="0">

                      <input type="checkbox" class="custom-control-input" id="masterCard" name="masterCard" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="masterCard"></label>

                      </div></td>

                        

                         

                      </tr>

                      <tr>

                        <td>Email Templates</td>

                        <?php

                        $val = 'emailTemplates';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="emailTemplates" value="0">

                      <input type="checkbox" class="custom-control-input" id="emailTemplates" name="emailTemplates" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="emailTemplates"></label>

                      </div></td>

                        

                         

                      </tr>



                      <tr>

                        

                        <td>Working Shift Controls</td>

                        <?php

                        $val = 'workShift';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="workShift" value="0">

                      <input type="checkbox" class="custom-control-input" id="workShift" name="workShift" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="workShift"></label>

                      </div></td>

                        

                        

                      </tr>

                      <tr>

                        

                        <td>Assign Shift</td>

                        <?php

                        $val = 'assignShift';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="assignShift" value="0">

                      <input type="checkbox" class="custom-control-input" id="assignShift" name="assignShift" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="assignShift"></label>

                      </div></td>

                        

                        

                      </tr>

                      <tr>

                        

                        <td>Working Location</td>

                        <?php

                        $val = 'workingLocation';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="workingLocation" value="0">

                      <input type="checkbox" class="custom-control-input" id="workingLocation" name="workingLocation" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="workingLocation"></label>

                      </div></td>

                        

                        

                      </tr>

                      <tr>

                        

                        <td>World City</td>

                        <?php

                        $val = 'worldCity';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="worldCity" value="0">

                      <input type="checkbox" class="custom-control-input" id="worldCity" name="worldCity" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="worldCity"></label>

                      </div></td>

                        

                        

                      </tr>

                      <tr>

                        

                        <td>Region Code</td>

                        <?php

                        $val = 'regionCode';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="regionCode" value="0">

                      <input type="checkbox" class="custom-control-input" id="regionCode" name="regionCode" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="regionCode"></label>

                      </div></td>

                        

                        

                      </tr>

                      <tr>

                        <td>SMTP Controls </td>

                        <?php

                        $val = 'smtpAccess';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="smtpAccess" value="0">

                      <input type="checkbox" class="custom-control-input" id="smtpAccess" name="smtpAccess" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="smtpAccess"></label>

                      </div></td>

                       

                         

                      </tr>

                      

                      

                      

                      <tr>

                        <td>Document Templates</td>

                        <?php

                        $val = 'documnetTemp';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="documnetTemp" value="0">

                      <input type="checkbox" class="custom-control-input" id="documnetTemp" name="documnetTemp" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="documnetTemp"></label>

                      </div></td>

                       

                         

                      </tr>

                      <tr>

                        <td>Dashboard Manager</td>

                        <?php

                        $val = 'dashManager';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="dashManager" value="0">

                      <input type="checkbox" class="custom-control-input" id="dashManager" name="dashManager" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="dashManager"></label>

                      </div></td>

                       

                         

                      </tr>
                      <tr>

                        <td>Holiday Master</td>

                        <?php

                        $val = 'holiMaster';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="holiMaster" value="0">

                      <input type="checkbox" class="custom-control-input" id="holiMaster" name="holiMaster" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="holiMaster"></label>

                      </div></td>

                       

                         

                      </tr>

                      <tr>

                        <td>Company Switcher</td>

                        <?php

                        $val = 'companySwitcher';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="companySwitcher" value="0">

                      <input type="checkbox" class="custom-control-input" id="companySwitcher" name="companySwitcher" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="companySwitcher"></label>

                      </div></td>

                       

                         

                      </tr>

                      <tr>

                        <td>Developer Setup</td>

                        <?php

                        $val = 'developerSetup';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="developerSetup" value="0">

                      <input type="checkbox" class="custom-control-input" id="developerSetup" name="developerSetup" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="developerSetup"></label>

                      </div></td>

                       

                         

                      </tr>

                      <tr>

                        <td>Database SQL Access</td>

                        <?php

                        $val = 'sqlAccess';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="sqlAccess" value="0">

                      <input type="checkbox" class="custom-control-input" id="sqlAccess" name="sqlAccess" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="sqlAccess"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Multi Level Group</td>

                        <?php

                        $val = 'multilevelGroup';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="multilevelGroup" value="0">

                      <input type="checkbox" class="custom-control-input" id="multilevelGroup" name="multilevelGroup" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="multilevelGroup"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Approval Hierarchy</td>

                        <?php

                        $val = 'approvalHierarchy';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="approvalHierarchy" value="0">

                      <input type="checkbox" class="custom-control-input" id="approvalHierarchy" name="approvalHierarchy" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="approvalHierarchy"></label>

                      </div></td>

                      </tr>

                      

                      

                    </tbody>

                  </table>

                </div>

              </div>

            </div> <!---- Global Setting Close ---->

            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-exclamation-circle"></i> Notice & Alerts</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      

                      <tr>

                        <td>Global Notice Alerts</td>

                        <?php

                        $val = 'noticeAlerts';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="noticeAlerts" value="0">

                      <input type="checkbox" class="custom-control-input" id="noticeAlerts" name="noticeAlerts" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="noticeAlerts"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Login Alerts</td>

                        <?php

                        $val = 'loginAlerts';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="loginAlerts" value="0">

                      <input type="checkbox" class="custom-control-input" id="loginAlerts" name="loginAlerts" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="loginAlerts"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Posted Salary Alerts</td>

                        <?php

                        $val = 'postedSalary';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="postedSalary" value="0">

                      <input type="checkbox" class="custom-control-input" id="postedSalary" name="postedSalary" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="postedSalary"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Loan & Advanced Request Alerts</td>

                        <?php

                        $val = 'loanRequest';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="loanRequest" value="0">

                      <input type="checkbox" class="custom-control-input" id="loanRequest" name="loanRequest" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="loanRequest"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Loan & Advanced Approval Alerts</td>

                        <?php

                        $val = 'loanApproval';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="loanApproval" value="0">

                      <input type="checkbox" class="custom-control-input" id="loanApproval" name="loanApproval" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="loanApproval"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Leave Request Alerts</td>

                        <?php

                        $val = 'leaveRequest';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="leaveRequest" value="0">

                      <input type="checkbox" class="custom-control-input" id="leaveRequest" name="leaveRequest" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="leaveRequest"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Leave Approval Alerts</td>

                        <?php

                        $val = 'leaveApproval';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="leaveApproval" value="0">

                      <input type="checkbox" class="custom-control-input" id="leaveApproval" name="leaveApproval" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="leaveApproval"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Attendance Request Alerts</td>

                        <?php

                        $val = 'attendRequest';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="attendRequest" value="0">

                      <input type="checkbox" class="custom-control-input" id="attendRequest" name="attendRequest" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="attendRequest"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Attendance Approval Alerts</td>

                        <?php

                        $val = 'attendApproval';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="attendApproval" value="0">

                      <input type="checkbox" class="custom-control-input" id="attendApproval" name="attendApproval" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="attendApproval"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Reimbursement Request Alerts</td>

                        <?php

                        $val = 'reimbuRequest';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="reimbuRequest" value="0">

                      <input type="checkbox" class="custom-control-input" id="reimbuRequest" name="reimbuRequest" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="reimbuRequest"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Reimbursement Approvals Alerts</td>

                        <?php

                        $val = 'reimbuApproval';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="reimbuApproval" value="0">

                      <input type="checkbox" class="custom-control-input" id="reimbuApproval" name="reimbuApproval" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="reimbuApproval"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Wall of Fame Alert</td>

                        <?php

                        $val = 'wallfameAlerts';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="wallfameAlerts" value="0">

                      <input type="checkbox" class="custom-control-input" id="wallfameAlerts" name="wallfameAlerts" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="wallfameAlerts"></label>

                      </div></td>

                      </tr>

                      <tr>

                        <td>Password Expiration Alert</td>

                        <?php

                        $val = 'passwordExpiry';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="passwordExpiry" value="0">

                      <input type="checkbox" class="custom-control-input" id="passwordExpiry" name="passwordExpiry" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="passwordExpiry"></label>

                      </div></td>

                      </tr>

                      

                      





                    </tbody>

                  </table>

                </div>

              </div>

            </div> <!---- alert Close ---->

            
            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-columns"> </i> Employee Profile Tabs</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>
                    <tr>
                      <td class="pl-5">Basic Information</td>
                      <?php
                      $val = 'basicInfotab';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="basicInfotab" value="0">
                        <input type="checkbox" class="custom-control-input" id="basicInfotab" name="basicInfotab" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="basicInfotab"></label>

                      </div></td>
                    </tr>
                    <tr>
                      <td class="pl-5">Payroll Details</td>
                      <?php
                      $val = 'payrollTabs';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="payrollTabs" value="0">
                        <input type="checkbox" class="custom-control-input" id="payrollTabs" name="payrollTabs" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="payrollTabs"></label>

                      </div></td>
                    </tr>
                    <tr>
                      <td class="pl-5">Bank Details</td>
                      <?php
                      $val = 'bankDetailtab';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="bankDetailtab" value="0">
                        <input type="checkbox" class="custom-control-input" id="bankDetailtab" name="bankDetailtab" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="bankDetailtab"></label>

                      </div></td>
                    </tr>
                    <tr>
                      <td class="pl-5">Education Details</td>
                      <?php
                      $val = 'educationTabs';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="educationTabs" value="0">
                        <input type="checkbox" class="custom-control-input" id="educationTabs" name="educationTabs" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="educationTabs"></label>

                      </div></td>
                    </tr>
                    <tr>
                      <td class="pl-5">Professional Details</td>
                      <?php
                      $val = 'professionalTabs';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="professionalTabs" value="0">
                        <input type="checkbox" class="custom-control-input" id="professionalTabs" name="professionalTabs" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="professionalTabs"></label>

                      </div></td>
                    </tr>
                    <tr>
                      <td class="pl-5">Salary Structure</td>
                      <?php
                      $val = 'salaryTabs';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="salaryTabs" value="0">
                        <input type="checkbox" class="custom-control-input" id="salaryTabs" name="salaryTabs" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="salaryTabs"></label>

                      </div></td>
                    </tr>
                    <tr>
                      <td class="pl-5">Salary Taxation</td>
                      <?php
                      $val = 'taxationTabs';
                      $sal = $sel->getControle($id,$val);
                      ?>

                      <td>
                        <div class="custom-control custom-switch">
                        <input type="hidden" name="taxationTabs" value="0">
                        <input type="checkbox" class="custom-control-input" id="taxationTabs" name="taxationTabs" value="1" <?php echo $sal == "1"? "checked": ""; ?>>
                        <label class="custom-control-label" for="taxationTabs"></label>

                      </div></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
            

            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-user-tie"></i> Profile Card Indexing</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body pb-0">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      <tr class="font-weight-bold bg-light" >

                        <td>  Basic Information Control</td>

                          

                        <td>

                          <button type="button" class="badge badge-secondary badge-pill btn" id="basicinfo">

                            <i class="fas fa-plus"></i>

                          </button>

                        </td>

                         

                      </tr>

                    </tbody>

                    <tbody id="basicinfoblk" style="display: none;">

                      <tr>

                        <td class="pl-5">Empolyee Name</td>

                        <?php

                        $val = 'empName';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empName" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_empname" name="empName" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_empname"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Empolyee Father</td>

                        <?php

                        $val = 'empFather';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empFather" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_empfadar" name="empFather" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_empfadar"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Company Email</td>

                        <?php

                        $val = 'companyEmail';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="companyEmail" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_comemail" name="companyEmail" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_comemail"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Date Of Birth</td>

                        <?php

                        $val = 'birthDay';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="birthDay" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_birthdate" name="birthDay" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_birthdate"></label>

                      </div></td>

                        

                        

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Mobile No</td>

                        <?php

                        $val = 'phoneNumber';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="phoneNumber" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_mobileno" name="phoneNumber" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_mobileno"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Gender</td>

                        <?php

                        $val = 'empGender';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empGender" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_gender" name="empGender" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_gender"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Marital Status</td>

                        <?php

                        $val = 'maritalStatus';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="maritalStatus" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_marital" name="maritalStatus" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_marital"></label>

                      </div></td>

                        

                        

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Profile Photo</td>

                        <?php

                        $val = 'profilePic';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="profilePic" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_photo" name="profilePic" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_photo"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Employee Address</td>

                        <?php

                        $val = 'localAddress';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="localAddress" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_local" name="localAddress" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_local"></label>

                      </div></td>

                       </tr>

                     

                      

                   </tbody>

                 </table>

               </div>

             </div>

             <div class="card-body py-0">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                     <tbody>

                     <tr class="font-weight-bold bg-light">

                        <td> Role and Responsibility</td>

                         

                        <td><button type="button" class="badge badge-secondary badge-pill btn" id="companyinfo">

                            <i class="fas fa-plus"></i>

                          </button></td>

                         

                      </tr>

                    </tbody>



                    <tbody id="companyinfoblk" style="display: none;">

                      <tr>

                        <td class="pl-5">Category</td>

                        <?php

                        $val = 'category';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="category" value="0">

                      <input type="checkbox" class="custom-control-input" id="category" name="category" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="category"></label>

                      </div></td>

                         

                      </tr>

                     <tr>

                        <td class="pl-5">Data of Joining</td>

                        <?php

                        $val = 'joiningDate';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="joiningDate" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_joindate" name="joiningDate" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_joindate"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Working Location</td>

                        <?php

                        $val = 'workLocation';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="workLocation" value="0">

                      <input type="checkbox" class="custom-control-input" id="workLocation" name="workLocation" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="workLocation"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Department</td>

                        <?php

                        $val = 'empDepart';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empDepart" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_depart" name="empDepart" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_depart"></label>

                      </div></td>

                        

                        

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Designation</td>

                        <?php

                        $val = 'empDesig';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empDesig" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_design" name="empDesig" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_design"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Reporting</td>

                        <?php

                        $val = 'empReporting';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empReporting" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_reporting" name="empReporting" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_reporting"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Role</td>

                        <?php

                        $val = 'empRole';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empRole" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_role" name="empRole" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_role"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      

                   </tbody>

                 </table>

               </div>

             </div>

             <div class="card-body py-0">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                     <tbody>

                     <tr class="font-weight-bold bg-light">

                        <td> Employee Payroll Information</td>

                         

                        <td><button type="button" class="badge badge-secondary badge-pill btn" id="payrollInfo">

                            <i class="fas fa-plus"></i>

                          </button></td>

                         

                      </tr>

                    </tbody>



                    <tbody id="payrollInfoblk" style="display: none;">

                      <tr>

                        <td class="pl-5">Employee Salary</td>

                        <?php

                        $val = 'empSalary';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empSalary" value="0">

                      <input type="checkbox" class="custom-control-input" id="empSalary" name="empSalary" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="empSalary"></label>

                      </div></td>

                         

                      </tr>

                     <tr>

                        <td class="pl-5">Payscale</td>

                        <?php

                        $val = 'empPayscale';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empPayscale" value="0">

                      <input type="checkbox" class="custom-control-input" id="empPayscale" name="empPayscale" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="empPayscale"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td class="pl-5">Pan Number</td>

                        <?php

                        $val = 'panNumber';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="panNumber" value="0">

                      <input type="checkbox" class="custom-control-input" id="panNumber" name="panNumber" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="panNumber"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td class="pl-5">TDS</td>

                        <?php

                        $val = 'empTDS';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="empTDS" value="0">

                      <input type="checkbox" class="custom-control-input" id="empTDS" name="empTDS" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="empTDS"></label>

                      </div></td>

                        

                        

                         

                      </tr>

                      <tr>

                        <td class="pl-5">PF Number</td>

                        <?php

                        $val = 'pfNumber';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="pfNumber" value="0">

                      <input type="checkbox" class="custom-control-input" id="pfNumber" name="pfNumber" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="pfNumber"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">UN Number</td>

                        <?php

                        $val = 'unNumber';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="unNumber" value="0">

                      <input type="checkbox" class="custom-control-input" id="unNumber" name="unNumber" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="unNumber"></label>

                      </div></td>

                        

                         

                         

                      </tr>

                      <tr>

                        <td class="pl-5">PF Effective Date</td>

                        <?php

                        $val = 'pfEffective';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="pfEffective" value="0">

                      <input type="checkbox" class="custom-control-input" id="pfEffective" name="pfEffective" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="pfEffective"></label>

                      </div></td>

                      </tr>



                      <tr>

                        <td class="pl-5">ESI Number</td>

                        <?php

                        $val = 'esicNumber';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="esicNumber" value="0">

                      <input type="checkbox" class="custom-control-input" id="esicNumber" name="esicNumber" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="esicNumber"></label>

                      </div></td>

                      </tr>



                      <tr>

                        <td class="pl-5">ESI Effective Date</td>

                        <?php

                        $val = 'esicEffective';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="esicEffective" value="0">

                      <input type="checkbox" class="custom-control-input" id="esicEffective" name="esicEffective" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="esicEffective"></label>

                      </div></td>

                      </tr>

                      

                   </tbody>

                 </table>

               </div>

             </div>

             <div class="card-body py-0">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                     <tbody>

                     <tr class="font-weight-bold bg-light">

                        <td> Education Controls</td>

                        <?php

                        $val = 'educationCont';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="educationCont" value="0">

                      <input type="checkbox" class="custom-control-input" id="education" name="educationCont" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="education"></label>

                      </div></td>

                        

                      </tr>

                    </tbody>

                    

                 </table>

               </div>

             </div>

             <div class="card-body py-0">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                     

                     

                    <tbody>

                      

                        <tr class="font-weight-bold bg-light">

                        <td>  Professional Controls</td>

                        <?php

                        $val = 'professionCont';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="professionCont" value="0">

                      <input type="checkbox" class="custom-control-input" id="profession" name="professionCont" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="profession"></label>

                      </div></td>

                         

                      </tr>

                      </tbody>

                      

                 </table>

               </div>

             </div>

              

            </div> <!---- Global Setting Close ---->

            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-users"></i> Employee Management</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      

                      <tr>

                        <td>Add Employee in Bulk</td>

                        <?php

                        $val = 'addBulk';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="addBulk" value="0">

                      <input type="checkbox" class="custom-control-input" id="addBulk" name="addBulk" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="addBulk"></label>

                      </div></td>

                        

                         

                      </tr>

                      <tr>

                        <td>Customize Form Fields</td>

                        <?php

                        $val = 'formFields';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="formFields" value="0">

                      <input type="checkbox" class="custom-control-input" id="formFields" name="formFields" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="formFields"></label>

                      </div></td>

                        

                         

                      </tr>

                      <tr>

                        <td>View Employee List</td>

                        <?php

                        $val = 'viewEmployee';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="viewEmployee" value="0">

                      <input type="checkbox" class="custom-control-input" id="viewEmployee" name="viewEmployee" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="viewEmployee"></label>

                      </div></td>

                        

                         

                      </tr>

                      

                     

                      <tr>

                        <td>Attendance Controls</td>

                        <?php

                        $val = 'attendanceCont';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="attendanceCont" value="0">

                      <input type="checkbox" class="custom-control-input" id="f_attendance" name="attendanceCont" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="f_attendance"></label>

                      </div></td>

                        

                         

                      </tr>

                      <tr>

                        <td>Login Time Correction</td>

                        <?php

                        $val = 'loginTimecorrecsn';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="loginTimecorrecsn" value="0">

                      <input type="checkbox" class="custom-control-input" id="logintime" name="loginTimecorrecsn" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="logintime"></label>

                      </div></td>

                         

                      </tr>

                      <tr>

                        <td>Any Password Reset</td>

                        <?php

                        $val = 'passReset';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="passReset" value="0">

                      <input type="checkbox" class="custom-control-input" id="passreset" name="passReset" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="passreset"></label>

                      </div></td>

                         

                      </tr>

                      

                      

                      

                      <tr>

                        <td>Leave Granted</td>

                        <?php

                        $val = 'leaveGrant';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="leaveGrant" value="0">

                      <input type="checkbox" class="custom-control-input" id="leavegrant" name="leaveGrant" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="leavegrant"></label>

                      </div></td>

                         

                      </tr>

                      

                     

                      

                    </tbody>

                  </table>

                </div>

              </div>

            </div> <!---- EMS Close ---->

            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-wallet"></i> Payroll</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      

                      <tr>

                        <td>ESI & PF Rate Setup</td>

                        <?php

                        $val = 'rateSetup';

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td><div class="custom-control custom-switch">

                          <input type="hidden" name="rateSetup" value="0">

                      <input type="checkbox" class="custom-control-input" id="rateSetup" name="rateSetup" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="rateSetup"></label>

                      </div></td>

                      </tr>





                    </tbody>

                  </table>

                </div>

              </div>

            </div> <!---- payroll Close ---->

            

            <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-user-tie"></i> Recruitment</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center text-secondary">

                      <th width="400px" class="text-left">Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      

                     

                      

                    </tbody>

                  </table>

                </div>

              </div>

            </div> <!---- Recruiter Close ---->

             <div class="card rounded-0 shadow-none border collapsed-card">

              <div class="card-header py-1 bg-light">

                <div class="card-title"><i class="fas fa-folder"></i> Software Pages Access</div>

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="text-center bg-secondary">

                      <th width="400px" class="text-left">Main Module Name</th>

                      <th width="10px">Show/Hide</th>

                      <th width="400px" class="text-left">Sub Module Name</th>

                      <th width="10px">Show/Hide</th>

                    </thead>

                    <tbody>

                      <?php



                      $table = "in_modular";

                      $cond = " `in_relate`='parent' AND `in_status`='1' ORDER BY `in_orderid`";

                      $select = new Selectall();

                      $pmenu = $select->getallCond($table,$cond);

                      foreach($pmenu as $pmn)

                      {

                        $post = str_replace(" ", "-",$pmn['in_modular']);

                        $postlug = strtolower($post);

                        $mid = $pmn['in_sno'];

                      $table = "in_modular";

                      $cond = " `in_relate`='child' AND `in_mainid`='$mid' AND `in_status`='1' ORDER BY `in_orderid`";

                      $select = new Selectall();

                      $smenu = $select->getallCond($table,$cond);

                      $sbcont = count($smenu);



                        ?>

                      <tr>

                        <td rowspan="<?php echo $sbcont;?>"><?php echo $post;?></td>

                        <?php

                        $val = $postlug;

                        $sal = $sel->getControle($id,$val);

                        ?>

                        <td rowspan="<?php echo $sbcont;?>"><div class="custom-control custom-switch">

                          <input type="hidden" name="<?php echo $postlug;?>" value="0">

                      <input type="checkbox" class="custom-control-input" id="<?php echo $postlug;?>" name="<?php echo $postlug;?>" value="1" <?php echo $sal == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="<?php echo $postlug;?>"></label>

                      </div></td>

                      <?php

                      $mid = $pmn['in_sno'];

                      $table = "in_modular";

                      $cond = " `in_relate`='child' AND `in_mainid`='$mid' AND `in_status`='1' ORDER BY `in_orderid`";

                      $select = new Selectall();

                      $smenu = $select->getallCond($table,$cond);

                      foreach($smenu as $smn)

                      {



                        $spost = str_replace(" ", "-",$smn['in_modular']);

                        $spostlug = strtolower($spost);

                        $table = "in_controller";

                        $cond = " `in_comid`='$comid' AND `in_groupid`='$id' AND `in_slug`='$spostlug' ";

                        $select = new Selectall();

                        $subjar = $select->getcondData($table,$cond);

                        



                        if($subjar != "")

                        {

                          $pasl = $subjar['in_action'];

                        }

                        else

                        {

                          $pasl = "0";

                        }

                      ?>

                      <td><?php echo $spost;?></td>

                      <td><div class="custom-control custom-switch">

                          <input type="hidden" name="<?php echo $spostlug;?>" value="0">

                      <input type="checkbox" class="custom-control-input" id="<?php echo $spostlug;?>" name="<?php echo $spostlug;?>" value="1" <?php echo $pasl == "1"? "checked": ""; ?>>

                      <label class="custom-control-label" for="<?php echo $spostlug;?>"></label>

                      </div></td>

                      </tr>

                      

                      <?php

                      

                      

                    }

                  }

                      ?>

                    </tbody>

                  </table>

                </div>

              </div>

            </div> <!---- Recruiter Close ---->



             

              <div class="clearfix">

                <input type="submit" class="btn btn-primary float-right" value="Save <?php echo $selDo;?> Access">

              </div>

            

          </div>

          </form>

          <?php

          }

          ?>

        </div>

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <script type="text/javascript" src="<?php echo BSURL?>assets/dist/js/basic-setup.js"></script>

 <?php



include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>

