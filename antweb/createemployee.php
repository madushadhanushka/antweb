<?php
include_once("engine/header.php");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_SESSION['cur_emp_id']=1;
$_SESSION['cur_emp_name']="mad";

$cur_emp_id=$_SESSION['cur_emp_id'];
$cur_emp_name=$_SESSION['cur_emp_name'];

?>
<html>
    <head>
        <title>Ant Creations</title>
        <script src="jquery-1.10.2.min.js"></script>
        <script>
    function submit(){
        var emp_name=$('#emp_name').val();
        var emp_username=$('#emp_username').val();
        var emp_graphic=$('#emp_chk_graphic').val();
        var emp_type=$('#emp_chk_typeset').val();
        var emp_printing=$('#emp_chk_printing').val();
        alert(emp_graphic+emp_type+emp_printing+emp_name);
        
                $.getJSON("engine/createuser.php", {emp_name:emp_name,emp_username:emp_username,emp_graphic:emp_graphic,emp_type:emp_type,emp_printing:emp_printing}, submit_res);
    }   
    function submit_res(json){
        alert(json);
    }
    </script>
    </head>
    <body>
        <div id="frm_reg">
        <br>User detail
        <div>Employee name</div>
        <input type="text" id="emp_name"></input>
        <div>Username</div>
        <input type="text" id="emp_username"></input>
        <div>Worker skills</div>
        <br><input type="checkbox" id="emp_chk_graphic">Graphic designing</input>
        <br><input type="checkbox" id="emp_chk_typeset">Typesetting</input>
        <br><input type="checkbox" id="emp_chk_printing">Digital Printing</input>
        <br><input type="button" value="Submit" onclick="submit()"/>
        </div>
    </body>
</html>