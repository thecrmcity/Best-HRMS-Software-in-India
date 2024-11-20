<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if(!defined('BSPATH'))

{
    $bspath = dirname(dirname((__DIR__)));
    include_once $bspath.'/config/Database.php';

}
$db = new Database();
?>
<?php
function validata($data)
{
    $encty = base64_encode($data);
    return $encty;

}
$fetchall = array();
$details = "";
$data = json_decode(file_get_contents("php://input"));
$sql = "SELECT * FROM `in_employee` WHERE `in_delete`='1'";
$res = mysqli_query($db->conn, $sql);
$nums = mysqli_num_rows($res);

if($nums > 0)
{
    while($rows = mysqli_fetch_assoc($res))
    {
        $rows = str_replace('/', "'/",$rows);
        $rows = str_replace('-', "'-",$rows);
        $imgpath = $rows['in_photo'];
        if($imgpath != "")
        {
          $imgpath = str_replace("'","", $imgpath);
          $rows['in_imgpath'] = "http://dev.inoday.us/uploads/employee/".$imgpath;  
        }
        else
        {
           $rows['in_imgpath'] = ""; 
        }
        
        $fetchall[] = $rows;

    }
}
else
{
    $fetchall['message'] = "No Data";
}

// print_r($fetchall);

$mater = json_encode($fetchall);
print_r(base64_encode($mater));


?>