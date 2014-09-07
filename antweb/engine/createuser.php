<?php
include_once("header.php");


$emp_name=$_GET['emp_name'];
$emp_username=$_GET['emp_username'];
$emp_graphic=$_GET['emp_graphic'];
$emp_type=$_GET['emp_type'];
$emp_printing=$_GET['emp_printing'];



echo json_encode(array($emp_name));
?>
