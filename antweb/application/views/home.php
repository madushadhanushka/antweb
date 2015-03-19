<h1>hooooooooooooooo</h1>
<h2></h2>
<?php
echo sha1("123");
echo form_open('send');
$name_data=array(
'name'=> 'name',
'id'=>'name',
'value'=> set_value('name')
);
?>
<label for="name">Name: <?php echo form_input($name_data);?></label>
<label for="name">Email: <input type="text" name="email" id="email" value="<?php echo set_value('email');?>" </label>
<?php
echo form_submit('submit','Submit'); 
?>
<?php
echo form_close();
?>