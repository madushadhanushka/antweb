<?php
//session_start();
include_once("engine/header.php");
mysql_connect($db_host,$db_user,$db_pass) or die("Error 101");
mysql_select_db($db_name) or die("Error 102");
$query="insert into $tbl_employee values('','udaya','uda','".md5("antweb")."',3,CURRENT_TIMESTAMP)";
mysql_query($query);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
