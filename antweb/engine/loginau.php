<?php
include_once 'header.php';

$username=strtolower(preg_replace('#[^A-Za-z0-9]#i', '',$_POST['username']));
$password=preg_replace('#[^A-Za-z0-9]#i', '',$_POST['password']);
$query="select * from $tbl_employee where username='$username'";
$result=mysql_query($query);
echo $query;
while($res_ar=mysql_fetch_array($result)){
    $user_id=$res_ar['id'];
    $user_name=$res_ar['name'];
    $user_type=$res_ar['type'];
    $user_password=$res_ar['password'];
}

if(md5($password)==$user_password){
    $_SESSION['user_id']=$user_id;
    $_SESSION['user_name']=$user_name;
    $_SESSION['user_type']=$user_type;
    
    switch($user_type){
        case $USER_TYPE_ADMIN:
            header("location:../Admin.php");
            break;
        case $USER_TYPE_EMPLOYEE:
            header("location:../work.php");
            break;
        case $USER_TYPE_RECEPTION:
            header("location:../reception.php");
            break;
    }
    

}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
