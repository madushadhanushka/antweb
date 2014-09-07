<?php
    include_once("engine/header.php");
    
    $cur_emp_type=$_SESSION['user_type'];
    if($cur_emp_type==$USER_TYPE_RECEPTION){
        $cur_emp_id=$_SESSION['user_id'];
        $cur_emp_name=$_SESSION['user_name'];
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
    </script>
    </head>

    <body>
        <div id="container" style="width:500px">

            <div id="header" style="background-color:#FFA500		;">
                <h1 style="margin-bottom:0;text-align:center;">	Ants Creation</h1></div>
            <div id="container" style="background-color:#EEEEEE;height:700px;width:500px;float:left;">
                <p><br>
                    <input name="newOrderButton" type="button" class="myButton" value="Add New Order" onclick="createNewOrder()"><br>
                    <input name="checkOrderStateButton" type="button" class="myButton" value="Check Order State"><br>
                </p>
                <table width="500" border="1">
                    <tr>
                        <th scope="col"><em>Not Assigned Orders</em></th>
                    </tr>

                </table>

                <table width="498" border="1">
                    <tr>
                        <td width="158" scope="col">&nbsp;</td>
                        <th width="160" scope="col">&nbsp;</th>
                        <th width="158" scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
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
                <br><input type="checkbox" id="chk_cust_graphic">Graphic</input>
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

    </body>
</html>