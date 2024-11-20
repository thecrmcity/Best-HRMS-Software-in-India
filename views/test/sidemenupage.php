<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo BSURL;?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inoday EMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo BSURL;?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fullname;?></a>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           <li class="nav-item">
            <a href="<?php echo BSURL;?>views/dashboard/" class="sidemen nav-link <?php echo ($pagename == 'dashboard') ? 'active' : ''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <?php

            $table = "in_modular";
            $cond = " `in_relate`='parent' AND `in_status`='1' ORDER BY `in_orderid`";
            $select = new Selectall();
            $pmenu = $select->getallCond($table,$cond);
            foreach($pmenu as $pmn)
            {
              $post = str_replace(" ", "-",$pmn['in_modular']);
              ?>
              <li class="nav-item">
                <a href="" class="sidemen nav-link <?php echo $pagename == strtolower($post) ? 'active' : ''?>">
                  <i class="nav-icon <?php echo $pmn['in_modicon'];?>"></i>
                  <p class="ml-2">
                    <?php echo $post;?>
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <?php
                    $mid = $pmn['in_sno'];
                    $table = "in_modular";
                    $cond = " `in_relate`='child' AND `in_mainid`='$mid' AND `in_status`='1' ORDER BY `in_orderid`";
                    $select = new Selectall();
                    $smenu = $select->getallCond($table,$cond);
                    ?>
                    
                    <?php
                  ?>
                </ul>
              </li>
              <?php
            }
          ?>
          
            
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/employee/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/employee/manage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Employee</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="sidemen nav-link <?php echo ($pagename == 'attendance') ? 'active' : ''?>">
              <i class="nav-icon far fa-address-card"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/attendance/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/attendance/manage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendace Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="sidemen nav-link <?php echo ($pagename == 'leaves') ? 'active' : ''?>">
              <i class="nav-icon fas fa-golf-ball"></i>
              <p>
                Leaves
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/leaves/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Leave</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/leaves/manage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Leave</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/leaves/holidays.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Holidays</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="sidemen nav-link <?php echo ($pagename == 'payroll') ? 'active' : ''?>">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Payroll
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/payroll/payscale.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payscale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/payroll/components.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Componets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/payroll/salary-setup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Setup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/payroll/manage-payroll.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Payroll</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="sidemen nav-link <?php echo ($pagename == 'reports') ? 'active' : ''?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Performance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/reports/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/reports/employee-ranking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Ranking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/reports/manage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Performance</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="sidemen nav-link <?php echo ($pagename == 'notice') ? 'active' : ''?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/notice/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/notice/manage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Notice</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="sidemen nav-link <?php echo ($pagename == 'setting') ? 'active' : ''?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Global Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/setting/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/setting/basic-setup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Setup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BSURL;?>views/setting/config.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configration</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>