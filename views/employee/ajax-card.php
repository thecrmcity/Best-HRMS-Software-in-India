<?php

if(!defined('BSPATH'))

{

	$bspath = dirname(dirname((__DIR__)));

	include_once $bspath.'/core/core.php';

}



if(isset($_GET['role']))

{

  ?>

  <div class="form-group row">

  <label class="col-sm-4 col-form-label">Assign Company</label>

  <div class="input-group col-sm-8">

    

    

      <?php

        $table = "in_master_card";

        $cond = " `in_relation`='company' ";

        $select = new Selectall();

        $selData = $select->getallCond($table,$cond);

        if(!empty($selData))

        {

        foreach($selData as $sel)

        {

          ?>

          <p class="mb-0">

          <input type="checkbox" name="multicom[]" value="<?php echo $sel['in_sno'];?>"> <?php echo $sel['in_prefix'];?>

          </p>

          <?php

        }

      }

      ?>



    

  </div>

</div>

  <?php

}



  if(isset($_GET['gste']))

  {

    $gste = $_GET['gste'];

    ?>

    <div class="form-group row">

      <label class="col-sm-4 col-form-label">Current State</label>

      <div class="input-group col-sm-8">

        

        <select class="form-control rounded-0" name="cstate">

          

          <?php

            $table = "in_worldcity";

            $cond = " `in_sno`='$gste' ";

            $select = new Selectall();

            $ctet = $select->getcondData($table,$cond);

            if($ctet != "")

            {

              ?>

              <option value="<?php echo $ctet['in_sno'];?>"><?php echo $ctet['in_statename'];?></option>

              <?php

            }

            ?>



        </select>

      </div>

    </div>

    <?php



  }

   if(isset($_GET['pgste']))

  {

    $pste = $_GET['pgste'];

    ?>

    <div class="form-group row">

      <label class="col-sm-4 col-form-label">Permanant State</label>

      <div class="input-group col-sm-8">

        

        <select class="form-control rounded-0" name="pstate">

          

          <?php

            $table = "in_worldcity";

            $cond = " `in_sno`='$pste' ";

            $select = new Selectall();

            $ctet = $select->getcondData($table,$cond);

            if($ctet != "")

            {

              ?>

              <option value="<?php echo $ctet['in_sno'];?>"><?php echo $ctet['in_statename'];?></option>

              <?php

            }

            ?>



        </select>

      </div>

    </div>

    <?php



  }

   if(isset($_GET['conty']))

  {

    $conty = $_GET['conty'];

    

    $table = "in_countries";

    $cond = " `in_sno`='$conty' ";

    $select = new Selectall();

    $stet = $select->getcondData($table,$cond);

    if($stet != "")

    {

      ?>

      <label class="col-form-label input-group-text rounded-0"><?php echo $stet['in_code'];?></label>

      <?php

    }

        



  }

   if(isset($_GET['pconty']))

  {

    $pconty = $_GET['pconty'];

    

    $table = "in_countries";

    $cond = " `in_sno`='$pconty' ";

    $select = new Selectall();

    $stet = $select->getcondData($table,$cond);

    if($stet != "")

    {

      ?>

      <label class="col-form-label input-group-text rounded-0"><?php echo $stet['in_code'];?></label>

      <?php

    }

        



  }

  if(isset($_GET['dob']) && isset($_GET['ret']))

  {

    $dob = $_GET['dob'];

    $ret = $_GET['ret'];

    $table = "in_companyinfo";

    $cond = " `in_comid`='$ret' ";

    $select = new Selectall();

    $age = $select->getcondData($table,$cond);

    if($age != "")

    {

      ?>

      <div class="form-group row">

        <label class="col-sm-4 col-form-label">Retirement Age</label>

        <div class="input-group col-sm-8">

          <div class="input-group-prepend">

            <span class="input-group-text rounded-0 bg-warning"><i class="fas fa-stopwatch"></i></span>

          </div>

          <input type="number" class="form-control rounded-0" name="retireage" id="retireage" value="<?php echo $age['in_retirement'];?>">

          



        </div>

      </div>

      <?php

    }

  }



  

?>