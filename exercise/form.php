<?php

function validate($data)
{
    //echo "<pre>";
    //print_r($data);
    //echo "</pre>";
    
    $message = array();

    if(isset($data) && is_array($data) && !empty($data['name']) && $data['name']!="" )
    {
        $message['success']['name'] = "Thank you";
    }
    else
    {
        $message['error']['name'] = "Please enter name";
    }

    if(isset($data) && is_array($data) && !empty($data['email']) && $data['email']!="" )
    {
        $message['success']['email'] = "Thank you";
    }
    else
    {
        $message['error']['email'] = "Please enter email";
    }

    return $message;
}
//$data = $_POST;
$result = array();
$result = validate($_POST);

echo "<pre>";
print_r( $_POST);
echo "</pre>";


?>

<form action="form.php" method="post">
Name: <input type="text" name="name"><br>
<?php if(!empty($result['error']['name'])) { ?>
<span><?=$result['error']['name']?> </span><br>
<?php } ?>
<?php if(is_array($result['success'])) { ?>
<span><?php echo $result['success']['name'];?> </span><br>
<?php } ?>
E-mail: <input type="text" name="email"><br>
<?php if(!empty($result['error']['email'])) { ?>
<span><?=$result['error']['email']?> </span><br>
<?php } ?>
<?php if(is_array($result['success'])) { ?>
<span><?php echo $result['success']['email'];?> </span><br>
<?php } ?>  
Address: <input type="textarea" name="address"><br>
<input type="submit">
</form>