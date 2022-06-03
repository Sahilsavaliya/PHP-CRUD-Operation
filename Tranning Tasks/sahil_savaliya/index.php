
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_login.css">
  
</head>
<body>
    
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form id="login_form" class="form_class" action="login_process.php" method="post">
            <div class="form_div">
                <label>Email:</label>
                <input class="field_class" name="email" type="text"  placeholder="Enter Email" required>
                <label>Password:</label>
                <input id="pass" class="field_class" name="password" type="password" placeholder="Enter Password" required> 


                <button class="submit_class" id="submit" type="submit" name="submit" value="Login">Login</button>
            </div>
            
        </form>
    </main>
    <!-- <footer>
    </footer> -->
</body>
</html>
