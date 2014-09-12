<?php
include_once 'header.php';
$orderID=$_GET['OrderID'];

$orderID=preg_replace('#[^0-9]#i','', $orderID);


$result=mysql_query("select * from $tbl_work where id=$orderID");
while($res_ar=  mysql_fetch_array($result)){
    $work_desc=$res_ar['desc'];
    $work_duedate=$res_ar['due_date'];
    $work_type=$res_ar['type'];
    $work_finaldate=$res_ar['final_date'];
    $work_status=$res_ar['status'];
}


echo json_encode(array("$work_desc",$work_duedate,$work_type,$work_finaldate,$work_status));
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
