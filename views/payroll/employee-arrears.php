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
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>
                  <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="card rounded-0">
            <div class="card-header headcolor">
               <div class="card-title"> <i class="fas fa-list"></i> Employee Arrear List</div>
               <div class="card-tools">
                  <a href="<?php echo VIEW.$pagename?>/claim-arrear.php" class="badge bg-purple"><i class="fas fa-business-time"></i> Arrear Form</a>
               </div>
            </div>
            <div class="card-body">
               <table class="table">
         <thead class="bg-dark">
            <tr>
               <th>Sr. No.</th>
               <th>No. Of Days</th>
               <th>Names</th>
               <th>Difference</th>
               <th>Arrear From</th>
               <th>Arrear To</th>
               <th>Reference</th>
               <th>Pay Month</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1</td>
               <td>5</td>
               <td>Sonu Kumar</td>
               <td>December</td>
               <td>Jaunary</td>
               <td>February</td>
               <td>-</td>
               <td>March</td>
            </tr>
            <tr>
               <td>2</td>
               <td>6</td>
               <td>Dilip Kumar</td>
               <td>December</td>
               <td>Jaunary</td>
               <td>February</td>
               <td>-</td>
               <td>March</td>
            </tr>
            <tr>
               <td>3</td>
               <td>6</td>
               <td>Tina Rani</td>
               <td>December</td>
               <td>Jaunary</td>
               <td>February</td>
               <td>-</td>
               <td>March</td>
            </tr>
         </tbody>
      </table>
            </div>
         </div>
      </div>
      <!-- close card company details -->
      
      <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
   include_once $bsurl.'/inc/alert.php';
   include_once $bsurl.'/inc/footer.php';
   ?>