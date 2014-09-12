<?php
include_once("engine/header.php");
    
if(checkLoginUser($USER_TYPE_RECEPTION)){
    initUser();
}else{
    die("Please login first. <br>Error 103");
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
        <script src="jquery-1.10.2.min.js"></script>
        <style type="text/css">
            .myButton {
                width: 200px;
                margin-left: 150px;
            }
        </style>
        <script>
            function createNewOrder(){
                $('#div_neworder').css("visibility", "visible");
            }
            function closeNewOrder(){
                $('#div_neworder').css("visibility", "hidden");
            }
            function showAssignOrder(OrderID){
                $.getJSON("engine/orderdetail.php", {OrderID:OrderID}, ret_orderdetail)
            }
            function ret_orderdetail(json){
                alert(json);
                $('#td_changeorder_orderid').html(json[0]);
                $('#div_changeorder').css("visibility","visible");
                
            }
    </script>
    </head>

    <body>
        <div id="container" style="width:800px">

            <div id="header" style="background-color:#FFA500		;">
                <h1 style="margin-bottom:0;text-align:center;">	Ants Creation</h1></div>
            <div id="container" style="background-color:#EEEEEE;height:700px;width:800px;float:left;">
                <p><br>
                    <input name="newOrderButton" type="button" class="myButton" value="Add New Order" onclick="createNewOrder()"><br>
                   
                </p>
                <table width="700" border="1">
                    <tr>
                        <th scope="col"><em>Not Assigned Orders</em></th>
                    </tr>

                </table>

                <table width="698" border="1">
                    <tr>
                        <td width="70" scope="col">Order ID</td>
                        <th width="160" scope="col">Type</th>
                        <th width="158" scope="col">Description</th>
                        <th width="158" scope="col">Due date</th>
                        <th width="158" scope="col">Assign Order</th>
                    </tr>
                    <tr>
                    <?php
                    echo sha1(rand(100, 1000));
                    $result=mysql_query("select * from $tbl_work where emp_id=0 limit 0,10");
                    while($res_ar=mysql_fetch_array($result)){
                        $work_id=$res_ar['id'];
                        $work_type=$res_ar['type'];
                        $work_desc=$res_ar['desc'];
                        $work_duedate=$res_ar['due_date'];
                        echo '<td>'.$work_id.'</td><td>'.getWorkType($work_type).'</td><td>'.$work_desc.'</td><td>'.$work_duedate.'</td><td><input type="button" value="Assign" onclick="showAssignOrder('.$work_id.')"></input></td>';
                    }
                    ?>
                    </tr>

                </table>
                <br>
                <table width="700" border="1">
                    <tr>
                        <th scope="col"><em>Assigned Orders</em></th>
                    </tr>

                </table>
                 <table width="698" border="1">
                    <tr>
                        <td width="80" scope="col">Order ID</td>
                        <th width="160" scope="col">Worker</th>
                        <th width="160" scope="col">Type</th>
                        <th width="158" scope="col">Description</th>
                        <th width="158" scope="col">Due date</th>
                        <th width="158" scope="col">Change Order</th>
                    </tr>
                    <tr>
                    <?php
                    $result=mysql_query("select * from $tbl_work,$tbl_employee where $tbl_work.emp_id!=0 and $tbl_work.emp_id=$tbl_employee.id limit 0,10");
                    while($res_ar=mysql_fetch_array($result)){
                        $work_id=$res_ar['id'];
                        $work_type=$res_ar['type'];
                        $work_desc=$res_ar['desc'];
                        $work_duedate=$res_ar['due_date'];
                        $emp_name=$res_ar['name'];
                        echo '<td>'.$work_id.'</td><td>'.$emp_name.'</td><td>'.getWorkType($work_type).'</td><td>'.$work_desc.'</td><td>'.$work_duedate.'</td><td><input type="button" value="Change" onclick="showAssignOrder('.$work_id.')"></input></td>';
                    }
                    ?>
                    </tr>

                </table>
                <br>
            </div>
            <div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
                Copyright © Epicsoft Software Solutions</div>
        </div>
        <div id="div_neworder" style="visibility: hidden; position: absolute; top: 100px;left: 100px;">
            <div id="div_neworder_cont" style="background-color:#EEEEFE">
                <br>Customer name:
                <br><input type="text" id="text_cust_name"></input></br>
                <br>Customer address:
                <br><textarea id="text_cust_name" col="30" row="5"></textarea></br>
                <br>Contact number:
                <br><input type="text" id="text_cust_mbnumb"></input></br>

                <br>Type of order:
                <br><input type="checkbox" id="chk_cust_graphic">Graphic</input>
                <br><input type="checkbox" id="chk_cust_typeset">Type settings</input>
                <br><input type="checkbox" id="chk_cust_webdesign">Web design</input>
                <br>Due date:
                <br><select id="sel_dueyear">
                    <?php
                    for($i=2014;$i<2050;$i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
                <select id="sel_duemonth">
                    <?php
                    for($i=1;$i<13;$i++){
                        echo '<option value="'.$i.'">'.getMonth($i).'</option>';
                    }
                    ?>
                </select>
                <select id="sel_dueday">
                    <?php
                    for($i=1;$i<32;$i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
                <br>Description :
                <br><textarea id="text_cust_desc" row="30" col="5"></textarea></br>
                <br>
                <input type="button" value="Create order" onclick="createOrder()"></input>
                <input type="button" value="Close" onclick="closeNewOrder()" style="right: 10px"></input>
            </div>
        </div>
        <div id="div_changeorder" style="visibility: hidden;background-color:#EEEEFE; position: absolute; top: 100px;left: 100px;">
            <div>Order detail</div>
            <table>
                <tr>
                    <td>Order ID: </td>
                    <td id="td_changeorder_orderid"></td>
                </tr>
            </table>
            
        </div>

    </body>
</html>