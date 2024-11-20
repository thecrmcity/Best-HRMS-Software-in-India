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
            <div class="card-title">FY 2024-2025</div>
            <div class="card-tools">
              
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6 col-md-6">
                <form class="" method="GET" action="" enctype="multipart/form-data">
                  <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Salary*</label>
                          <div class="input-group col-sm-8">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0 bg-success"><i class="fas fa-rupee-sign"></i></span>
                            </div>
                            <input type="text" class="form-control rounded-0" name="salary" placeholder="Salary" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tax Slab*</label>
                          <div class="input-group col-sm-8">
                            
                            <select class="form-control rounded-0" name="payscale" required>
                              <option value="">Select Slab</option>
                              <option value="OldSlab">Old Slab</option>
                              <option value="NewSlab">New Slab</option>

                            </select>
                          </div>
                        </div>
                        <input type="submit" name="gettax" value="Get Value" class="btn btn-primary">
                </form>
              </div>
              <div class="col-sm-6 col-md-6">
                
                <?php
                if(isset($_GET['gettax']))
                {
                  $salary = $_GET['salary'];
                  $payscale = $_GET['payscale'];
                  $results = array();
                  $madvalue = array();
                  $slab = array();
                  $rested = array();

                  $table = "in_taxslab";
                  $cond = " `in_financenam`='$payscale' ";
                  $select= new Selectall();
                  $selData = $select->getallCond($table,$cond);
                  
                  if(!empty($selData))
                  {
                    foreach($selData as $sel)
                    {
                      $madvalue[] = $sel['in_diffence'];
                      $slab[] = $sel['in_slabvalue'];
                    }
                  }

                  
                  $results[] = $salary - $madvalue[0];
                  
                  for($i=1; $i < count($madvalue); $i++)
                  {

                    
                    if($madvalue[$i] == "0")
                    {
                      break;
                    }
                    else
                    {
                      $results[] = $results[$i-1]-$madvalue[$i];
                    }
                    
                   
                  }
                  $negative = array_filter($results, function ($item) {
                    return $item < 0;
                  });
                  if($negative != "")
                  {
                    $results = array_filter($results, function ($item) {
                      return $item > 0;
                    });
                    $endslab = end($results);

                    $matres = count($results);
                    for($j=0;$j<=$matres;$j++)
                    {
                      if($matres == $j)
                      {
                        $rested[] = (($slab[$j]*$endslab)/100);
                      }
                      else
                      {
                        $rested[] = (($slab[$j]*$madvalue[$j])/100);
                      }
                      
                      
                    }

                  }
                  else
                  {
                    $endslab = end($results);
                    for($j=0;$j<count($slab);$j++)
                    {
                      if($madvalue[$j] == "0")
                      {
                        $rested[] = (($slab[$j] * $endslab)/100);
                      }
                      else
                      {
                        $rested[] = (($slab[$j]*$madvalue[$j])/100);
                      }
                      
                    }
                  }
                  
                  
          

                }
                if(isset($_GET['gettax']))
                {
                  ?>
                  <table style="width: 100%;" cellpadding="10px" cellspacing="10px" border="1">
                  <tr>
                    <td>Income Tax</td>
                    <td class="font-weight-bold"><?php if($rested != "0"){ $tax = array_sum($rested);echo $tax;}else{ echo "0";} ?></td>
                  </tr>
                  <tr>
                    <td>Health and Education Cess</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Total Tax Liability</td>
                    <td></td>
                  </tr>
                </table>
                  <?php
                }
                ?>
                 

              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>