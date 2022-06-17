<?php
// require 'login_process.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_login.css">
    <script src="../js/admin.js"></script>
  
</head>
<body>
    
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form id="login_form" action="login_process.php" class="form_class" action="" method="post">
            <div class="form_div">
                <label>Email:</label>
                <input class="field_class" name="email" type="text" id="EmailId"  placeholder="Enter Email" required>
                <small id="EmailIdValidation" class="text-danger"></small><br>

                <label>Password:</label>
                <input id="Password" class="field_class" name="password" type="password" placeholder="Enter Password" required>
                <small id="PasswordValidation" class="text-danger"></small><br>
 


                <button class="submit_class" id="submit" type="submit" name="submit" value="Login">Login</button>
            </div>
            
        </form>
    </main>
    <!-- <footer>
    </footer> -->
</body>
</html>
