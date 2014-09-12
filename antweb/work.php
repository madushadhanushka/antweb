.<?php
include_once("engine/header.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(checkLoginUser($USER_TYPE_EMPLOYEE)){
    initUser();
}else{
    die("Please login first. <br>Error 103");
}


?>
<html>
    <head>
        <title>Ant Creations</title>
    </head>
    <body>
        <h1>Employee View</h1>
        Welcome <?php echo $cur_emp_name ?>
        <div>Due Works<div>
        <table width="50%" border="1">
            <tr><td>Work ID</td><td>work Description</td><td>Due Date</td><td>Operation</td></tr>
            <?php
                $res_work=mysql_query("select * from $tbl_work where emp_id=$cur_emp_id limit 0,10");
                while($res_ar=mysql_fetch_array($res_work)){
                    $work_id=$res_ar['id'];
                    $work_type=$res_ar['type'];
                    $work_desc=$res_ar['desc'];
                    $work_duedate=$res_ar['due_date'];
                    echo '<tr><td>'.$work_id.'</td><td>'.$work_desc.'</td><td>'.$work_duedate.'</td><td><input type="button" value="Start" onclick="start_work('."'".$work_id."'".'")/><input type="button" value="Comment" onclick="comment_work('."'".$work_id."'".'") /><input type="button" value="Detail" onclick="detail_work('."'".$work_id."'".'") /></td></tr>';
                }
            ?>
        </table>
                <div>On going work</div>
                <table width="50%" border="1">
            <tr><td>Work ID</td><td>work Description</td><td>Due Date</td><td>Operation</td></tr>
            <?php
                $res_work=mysql_query("select * from $tbl_work where emp_id=$cur_emp_id limit 0,10");
                while($res_ar=mysql_fetch_array($res_work)){
                    $work_id=$res_ar['id'];
                    $work_type=$res_ar['type'];
                    $work_desc=$res_ar['desc'];
                    $work_duedate=$res_ar['due_date'];
                    echo '<tr><td>'.$work_id.'</td><td>'.$work_desc.'</td><td>'.$work_duedate.'</td><td><input type="button" value="Finalize" onclick="start_work('."'".$work_id."'".'")/><input type="button" value="Comment" onclick="comment_work('."'".$work_id."'".'") /><input type="button" value="Detail" onclick="detail_work('."'".$work_id."'".'") /></td></tr>';
                }
            ?>
        </table>
                <div>Completed Work</div>
                <table width="50%" border="1">
            <tr><td>Work ID</td><td>work Description</td><td>Due Date</td><td>Finalize Date</td><td>Operation</td></tr>
            <?php
                $res_work=mysql_query("select * from $tbl_work where emp_id=$cur_emp_id limit 0,10");
                while($res_ar=mysql_fetch_array($res_work)){
                    $work_id=$res_ar['id'];
                    $work_type=$res_ar['type'];
                    $work_desc=$res_ar['desc'];
                    $work_duedate=$res_ar['due_date'];
                    $work_finaldate=$res_ar['final_date'];
                    echo '<tr><td>'.$work_id.'</td><td>'.$work_desc.'</td><td>'.$work_duedate.'</td><td>'.$work_finaldate.'</td><td><input type="button" value="Start" onclick="start_work('."'".$work_id."'".'")/><input type="button" value="Comment" onclick="comment_work('."'".$work_id."'".'") /><input type="button" value="Detail" onclick="detail_work('."'".$work_id."'".'") /></td></tr>';
                }
            ?>
        </table>
    </body>
</html>

