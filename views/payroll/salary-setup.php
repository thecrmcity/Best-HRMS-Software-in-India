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

        <div class="row">

          <div class="col-sm-6 col-md-6">

            <form class="form-inline" method="GET">

              

              <div class="input-group">

                  <select class="form-control rounded-0" name="pay" required>

                    <?php

                    if(isset($_GET['pay']))

                    {

                      $pay = $_GET['pay'];

                      $table = "in_payscale";

                      $cond = " in_category='payscale' AND in_sno='$pay'";

                      $select = new Selectall();

                      $pay = $select->getcondData($table,$cond);

                      $spay = $pay['in_namescle'];

                    }

                    else

                    {

                      $spay = "--Select--";

                    }

                    ?>

                <option value=""><?php echo $spay;?></option>

                <?php

                $table = "in_payscale";

                $cond = " in_category='payscale' AND in_status='1'";

                $select = new Selectall();

                $pay = $select->getallCond($table,$cond);

                if($pay != "")

                {

                  foreach($pay as $py)

                  {

                    ?>

                    <option value="<?php echo $py['in_sno'];?>"><?php echo $py['in_namescle'];?></option>

                    <?php

                  }

                }

                ?>

              </select>

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text rounded-0">Go</button>

                  </div>

                </div>



            </form>

          </div>

          <div class="col-lg-6 col-md-6">

            <?php

              if(isset($_GET['pay']))

              {

                ?>

                <div class="clearfix">

                  <button class="float-right btn btn-info" id="addrow"><i class="fas fa-plus"></i> Add Row</button>

                </div>

                

                <?php

              }

            ?>

          </div>

        </div>

        <hr>

        <!-- /.row -->

        <?php

          if(isset($_GET['pay']))

          {

            $pad = $_GET['pay'];

            $table = "in_salarysetup";

            $cond = " `in_comid`='$comid' AND `in_payscale`='$pad' ";

            $select = new Selectall();

            $say = $select->getallCond($table,$cond);

            if(count($say) != "0")

            {

              $act = "editsetup";

            }

            else

            {

              $act = "salarysetup";

            }

          }

          else

          {

            $pad = "";

            

          }

        ?>

        <form class="" method="POST" action="<?php echo BSURL;?>functions/payroll.php?case=<?php echo $act;?>&id=<?php echo $pad;?>">
          <div class="table-responsive">
        <table class="table table-bordered bg-white">

          <thead>

            <td width="200px">Components</td>

            <td>Calculation</td>

            <td>Group</td>

            <td>Rule</td>

            <td>Base</td>

            <td>Flat Amount</td>

            <td>Percentage</td>

            <td>ESI</td>

            <td>PF</td>

            <td>TDS</td>

            <td>TDS Reference</td>

            <td>Round Off</td>

            <td><i class="fas fa-trash"></i></td>

          </thead>

          

          <tbody id="fullcom">

            <?php

              if(isset($_GET['pay']))

              {

                $pay = $_GET['pay'];

                $table = "in_salarysetup";

                $cond = " `in_payscale`='$pay'";

                $select = new Selectall();

                $say = $select->getallCond($table,$cond);

                if($say != "")

                {



               foreach($say as $sy)

                {

                  $cpoid = $sy['in_compoid'];

                  $table = "in_payscale";

                  $cond = " `in_sno`='$cpoid' ";

                  $select = new Selectall();

                  $cmpo = $select->getcondData($table,$cond);

                  if($cmpo != "")

                  {

                    $comname = $cmpo['in_namescle'];

                    $cats = $cmpo['in_category'];

                  }

                  else

                  {

                    $comname = "";

                    $cats = "";

                  }

                  ?>

                  <tr>

                    <td><select name="compo[]" class="netcomn" required>

                      <option value="<?php echo $sy['in_compoid'];?>"><?php echo $comname;?> (<?php echo $cats;?>)</option><?php 

                  $table = "in_payscale";

                  $cond = " `in_category` != 'payscale' AND `in_status` = '1'";

                  $select = new Selectall();

                  $compo = $select->getallCond($table,$cond);

                  foreach($compo as $com){ ?>

                  <option value="<?php echo $com['in_sno'];?>"><?php echo $com['in_namescle'];?> (<?php echo $com['in_category'];?>)</option><?php } ?>

                  </select></td>

                  <td><select name="calcu[]" class="netcom">

                    <option value="<?php echo $sy['in_calculation'];?>"><?php echo $sy['in_calculation'];?></option>

                    <option value="variable">Variable</option><option value="flat">Flat</option></select></td>
                  <td>
                  <select name="grouped[]" class="netcomn" required>
                    <option value="">--Select--</option>
                    <?php
                      $table = "in_multigroup";
                      $inner = " DISTINCT in_perentid AS prenet, in_groupname AS psgroup ";
                      $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                      $select = new Selectall();
                      $sups = $select->getallInnercond($table,$inner,$cond);
                      if(!empty($sups)){
                        foreach($sups as $sup){ ?>
                        <option value="<?php echo $sup['prenet']?>"><?php echo $sup['psgroup'];?></option>
                        <?php
                        }
                      }
                    ?>
                  </select>
                  </td>
                  <td><select name="rule[]" class="netcom"><option value="everymonth">Every Month</option><?php
                    for($cp=0;$cp<=12;$cp++){
                      ?>
                      <option value="<?php echo date('F', strtotime('Y-'.$cp))?>"><?php echo date('F', strtotime('Y-'.$cp))?></option>
                      <?php
                    
                    }
                  ?></select></td>
                  <td><select name="base[]" class="netcom"><option value="basic">Basic</option><option value="ctc">CTC</option></select></td>

                  <td><input type="text" class="netcom" name="flamout[]" value="<?php echo $sy['in_flatamount'];?>"></td>

                  <td><input type="text" class="netcom" name="flper[]" value="<?php echo $sy['in_percentage'];?>"></td>

                  <td><input type="checkbox" name="flesi[]" value="1" <?php echo $sy['in_esi'] == "1" ? "checked" : "";?>></td>

                  <td><input type="checkbox" name="flpf[]" value="1" <?php echo $sy['in_pf'] == "1" ? "checked" : "";?>></td>

                  <td><input type="checkbox" name="fltds[]" value="1" <?php echo $sy['in_tds'] == "1" ? "checked" : "";?>></td>

                  <td><select name="tdsref[]" class="netcom" ><option value="">--Select--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='tdsReference' AND `in_status`='1' ";
                    $select = new Selectall();
                    $refer = $select->getallCond($table,$cond);

                  if($refer != ""){foreach($refer as $mg){?>

                    <option value="<?php echo $mg['in_sno'];?>"><?php echo $mg['in_prefix'];?></option>
                    <?php 
                    }

                  }
                  ?>
                  </select></td>

                  <td><input type="checkbox" name="rdoff[]" value="1" <?php echo $sy['in_roundoff'] == "1" ? "checked" : "";?>></td>

                  <td><a href="<?php echo BSURL;?>functions/payroll.php?case=delSal&id=<?php echo $sy['in_sno'];?>&pay=<?php echo $_GET['pay'];?>" class="text-danger" onclick="return confirm('Are you sure!');"><i class="fas fa-trash"></i></a></td>

                  </tr>

                  <?php

                }

              }



              }

            ?>

          </tbody>

          <?php

            if(isset($_GET['pay']))

            {

              ?>

              <tr class="card-footer">

            

            <td colspan="13"><input type="submit" class="btn btn-primary float-right px-5" value="Save"></td>

            

          </tr>

              <?php

            }

          ?>

          

          

        </table>
        </div>
        </form>

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <script type="text/javascript">

    $(document).ready(function(){

      $("#addrow").click(function(){

          var lastField = $("#fullcom tr:last");

          var fieldWrapper = $("<tr/>");

          var fName = $("<td><select name=\"compo[]\" class=\"netcomn\" required id=\"compod\"><option value=\"\">--Select--</option><?php 

                $table = "in_payscale";

                $cond = " `in_category` != 'payscale' AND `in_status` = '1'";

                $select = new Selectall();

                $compo = $select->getallCond($table,$cond);

                foreach($compo as $com){ ?><option value=\"<?php echo $com['in_sno'];?>\"><?php echo $com['in_namescle'];?> (<?php echo $com['in_category'];?>)</option><?php } ?></select></td>");

          

          var pName = $("<td><select name=\"calcu[]\" class=\"netcom\"><option value=\"variable\">Variable</option><option value=\"flat\">Flat</option></select></td>");

          var grName = $("<td><select name=\"grouped[]\" class=\"netcomn\" required><option value=\"\">--Select--</option><?php
                      
                      $table = "in_multigroup";
                      $inner = " DISTINCT in_perentid AS prenet, in_groupname AS psgroup ";
                      $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                      $select = new Selectall();
                      $group = $select->getallInnercond($table,$inner,$cond);
                      if(!empty($group)){
                        foreach($group as $grou){ ?><option value=\"<?php echo $grou['prenet']?>\"><?php echo $grou['psgroup'];?></option><?php
                        }
                      }
                    ?></select></td>");
          var mtName = $("<td><select name=\"rule[]\" class=\"netcom\"><option value=\"everymonth\">Every Month</option><?php
                      for($cp=1;$cp<=12;$cp++){
                      ?><option value=\"<?php echo date('F', strtotime(date('Y-'.$cp)));?>\"><?php echo date('F', strtotime(date('Y-'.$cp)));?></option><?php
                    
                    }
                  ?></select></td>");
          var qName = $("<td><select name=\"base[]\" class=\"netcom\"><option value=\"basic\">Basic</option><option value=\"ctc\">CTC</option></select></td>");

          var rName = $("<td><input type=\"text\" class=\"netcom\" name=\"flamout[]\"></td>");

          var sName = $("<td><input type=\"text\" class=\"netcom\" name=\"flper[]\"></td>");

          var tName = $("<td><input type=\"checkbox\" name=\"flesi[]\" value=\"1\"></td>");

          var uName = $("<td><input type=\"checkbox\" name=\"flpf[]\" value=\"1\"></td>");

          var vName = $("<td><input type=\"checkbox\" name=\"fltds[]\" value=\"1\"></td>");

          var wName = $("<td><select name='tdsref[]' class='netcom ><option value=''>--Select--</option><?php 
                $table = "in_master_card";
                $cond = " `in_relation`='tdsReference' AND `in_status`='1' ";
                $select = new Selectall();
                $refer = $select->getallCond($table,$cond);

                  if($refer != ""){foreach($refer as $mg){?>
                    <option value=\"<?php echo $mg['in_sno'];?>\"><?php echo $mg['in_prefix'];?></option><?php 
                    }

                  }
                  ?></select></td>");

          var xName = $("<td><input type=\"checkbox\" name=\"rdoff[]\" value=\"1\"></td>");



                    

          var removeButton = $("<td><i class=\"fas fa-trash remove\"></i></td>");

          removeButton.click(function() {

              $(this).parent().remove();

          });

          fieldWrapper.append(fName);

          fieldWrapper.append(pName);

          fieldWrapper.append(grName);

          fieldWrapper.append(mtName);

          fieldWrapper.append(qName);

          fieldWrapper.append(rName);

          fieldWrapper.append(sName);

          fieldWrapper.append(tName);

          fieldWrapper.append(uName);

          fieldWrapper.append(vName);

          fieldWrapper.append(wName);

          fieldWrapper.append(xName);

          fieldWrapper.append(removeButton);

          $("#fullcom").append(fieldWrapper);

      });

    });



  </script>

  



 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>