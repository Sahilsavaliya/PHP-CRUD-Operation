<?php
session_start();
 
if(!empty($_POST))
{
    if(!empty($_POST['email']))
    {
        $_SESSION['login']['email'] = $_POST['email'];
    }

    if(!empty($_POST['password']))
    {
        $_SESSION['login']['password'] = $_POST['password'];
    }
    

    
    
}

echo "<pre>";
    print_r($_SESSION['login']);
    echo "</pre>";
?>

<a href="logout.php"> logout </a>