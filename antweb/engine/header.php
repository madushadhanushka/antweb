<?php

$db_name = "antweb";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$tbl_work = "work";
$tbl_employee = "employee";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$USER_TYPE_ADMIN = 1;
$USER_TYPE_RECEPTION = 2;
$USER_TYPE_EMPLOYEE = 3;

$WORK_TYPE_WEB = 1;
$WORK_TYPE_TYPING = 2;
$WORK_TYPE_PRINTING = 3;

$WOTK_STATE_FREE = 1;
$WORK_STATE_WORKING = 2;
$WORK_STATUS_FINISHED = 3;

session_start();

mysql_connect($db_host, $db_user, $db_pass) or die("Error 101");
mysql_select_db($db_name) or die("Error 102");

function getMonth($i) {
    switch ($i) {
        case 1:
            return "January";
        case 2:
            return "February";
        case 3:
            return "March";
        case 4:
            return "April";
        case 5:
            return "May";
        case 6:
            return "June";
        case 7:
            return "July";
        case 8:
            return "August";
        case 9:
            return "September";
        case 10:
            return "October";
        case 11:
            return "November";
        case 12:
            return "December";
    }
}

?>
