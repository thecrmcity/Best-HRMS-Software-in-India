<?php

if(!defined('BSPATH'))

{

	$bspath = dirname(dirname((__DIR__)));

	include_once $bspath.'/core/core.php';

}

if(isset($_GET['case']))
{
    $case = $_GET['case'];
    switch($case)
    {
        case "approval":
            $id = $_GET['id'];
            switch($id)
            {
                case "All":
                $table = "in_employee";
                $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                $select = new Selectall();
                $selData = $select->getallCond($table,$cond);
                
                if(!empty($selData))
                {
                    $xl =1;
                    foreach($selData as $res)
                    {
                        
                        $desi = $res["in_designation"];
                        $select = new Selectall();
                        $desit = $select->getPosition($desi);

                        $pre = $res['in_emprefix'];
                        $reid = $select->prefix($pre);

                        $dept = $res['in_department'];
                        $rept = $res['in_reporting'];
                        $deprt = $select->getDepartment($dept);
                        $repts = $select->getDepartment($rept);
                        

     
                        ?>
                        <tr>
                            <td><?php echo $xl;?></td>
                            <td><?php echo $reid.$res['in_empid'];?></td>
                            <td><?php echo $res['in_fname']." ".$res['in_lname'];?></td>
                            <td><?php echo $desit;?></td>
                            <td><?php echo $deprt;?></td>
                            <td><?php echo $repts;?></td>
                            <td><input type="checkbox" name="cantrash[]" value="<?php echo $res['in_empid'];?>" class="chk_me"></td>

                        </tr>
                        <?php
                        $xl++;
                    }
                }
                
                break;
                case "Department":
                ?>
                <div class="form-group">
                <select name="assignfil" class="form-control" id="assignfil">
                    <option value="">--Select--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " in_relation IN ('department') and in_status='1'";
                    $select = new Selectall();
                    $seldesi = $select->getallCond($table,$cond);
                    if(!empty($seldesi))
                    {
                        foreach($seldesi as $sel)
                        {
                            ?>
                            <option value="<?php echo $sel['in_sno']?>"><?php echo $sel['in_prefix']?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                </div>
                <?php
                break;
                case "Designation":
                    ?>
                <div class="form-group">
                <select name="assignfil" class="form-control" id="assignfil">
                <option value="">--Select--</option>
                <?php
                $table = "in_master_card";
                $cond = " in_relation IN ('designation', 'masterDesignation') and in_status='1'";
                $select = new Selectall();
                $seldesi = $select->getallCond($table,$cond);
                if(!empty($seldesi))
                {
                    foreach($seldesi as $sel)
                    {
                        ?>
                        <option value="<?php echo $sel['in_sno']?>"><?php echo $sel['in_prefix']?></option>
                        <?php
                    }
                }
                ?>
                </select>
                </div>
                <?php
                break;
                case "Groups":
                break;
                case "Departmentval":
                $val = $_GET['val'];
                
                $table = "in_employee";
                $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_department`='$val' ";
                $select = new Selectall();
                $selData = $select->getallCond($table,$cond);
                
                if(!empty($selData))
                {
                    $xl =1;
                    foreach($selData as $pen)
                    {
                        
                        $desi = $pen["in_designation"];
                        $select = new Selectall();
                        $desit = $select->getPosition($desi);

                        $pre = $pen['in_emprefix'];
                        $reid = $select->prefix($pre);

                        $dept = $pen['in_department'];
                        $rept = $pen['in_reporting'];
                        $deprt = $select->getDepartment($dept);
                        $repts = $select->getDepartment($rept);

        
                        ?>
                        <tr>
                            <td><?php echo $xl;?></td>
                            <td><?php echo $reid.$pen['in_empid'];?></td>
                            <td><?php echo $pen['in_fname']." ".$pen['in_lname'];?></td>
                            <td><?php echo $desit;?></td>
                            <td><?php echo $deprt;?></td>
                            <td><?php echo $repts;?></td>
                            <td><input type="checkbox" name="cantrash[]" value="<?php echo $pen['in_empid'];?>" class="chk_me"></td>

                        </tr>
                        <?php
                        $xl++;
                    }
                }
                else
                {
                    ?>
                    <tr>
                        <td class="text-center" colspan="7">No Data</td>
                    </tr>
                    <?php
                }
                break;
                case "Designationval":
                    $val = $_GET['val'];
                    
                    $table = "in_employee";
                    $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_designation`='$val' ";
                    $select = new Selectall();
                    $selData = $select->getallCond($table,$cond);
                    
                    if(!empty($selData))
                    {
                        $xl =1;
                        foreach($selData as $pen)
                        {
                            
                            $desi = $pen["in_designation"];
                            $select = new Selectall();
                            $desit = $select->getPosition($desi);
    
                            $pre = $pen['in_emprefix'];
                            $reid = $select->prefix($pre);
    
                            $dept = $pen['in_department'];
                            $rept = $pen['in_reporting'];
                            $deprt = $select->getDepartment($dept);
                            $repts = $select->getDepartment($rept);
    
            
                            ?>
                            <tr>
                                <td><?php echo $xl;?></td>
                                <td><?php echo $reid.$pen['in_empid'];?></td>
                                <td><?php echo $pen['in_fname']." ".$pen['in_lname'];?></td>
                                <td><?php echo $desit;?></td>
                                <td><?php echo $deprt;?></td>
                                <td><?php echo $repts;?></td>
                                <td><input type="checkbox" name="cantrash[]" value="<?php echo $pen['in_empid'];?>" class="chk_me"></td>
    
                            </tr>
                            <?php
                            $xl++;
                        }
                    }
                    else
                    {
                        ?>
                        <tr>
                            <td class="text-center" colspan="7">No Data</td>
                        </tr>
                        <?php
                    }
                    break;
            }
        break;
        
        
    }
}

?>