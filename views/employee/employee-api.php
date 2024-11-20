<?php
header("Access-Control-Allow-Origin: http://ems.inoday.us/views/employee/employee-api.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if(!defined('BSPATH'))

{
    $bspath = dirname(dirname((__DIR__)));
    include_once $bspath.'/core/core.php';

}
?>
<?php
$data = json_decode(file_get_contents("php://input"));
$table = "in_employee";
$cond = " `in_compid`='$comid' AND `in_delete`='1' ";
$select = new Selectall();
$data = $select->getallCond($table,$cond);

if(!empty($data))
{
    echo json_encode($data);
}
else
{
    echo "No Data";
}
?>