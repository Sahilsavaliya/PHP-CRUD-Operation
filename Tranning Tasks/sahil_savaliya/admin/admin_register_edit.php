<?php 
session_start();
$email = $_SESSION['email1'];
if(!$email){
    header('location:login.php');
}
?>

<!-- fatch data -->
<?php
require '../dbconnect.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
// echo"$id"; 
$query = "SELECT * FROM `login_admin` WHERE id=$id";

 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_assoc($result);
  ?>

<html>

<head>
    <title>Admin Update</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="../js/dashboard.js"> </script>
    <link href="../css/admin_register.css" rel="Stylesheet" type="text/css" />
    <link href="../css/dashboard.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>

</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<body class="home">
    <!-- <div class="container-fluid display-table"> -->
    <!-- <div class="row display-table-row"> -->
    <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
        <div class="logo">
        </div>
        <div class="navi">
            <ul>
                <li class="active"><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i><span
                            class="hidden-xs hidden-sm">Home</span></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10 col-sm-11 display-table-cell v-align">
        <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
        <div class="row">
            <header>
                <div class="col-md-7">

                    <!-- <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                               
                                </div>
                            </nav> -->

                </div>
                <div class="col-md-5">
                    <div class="header-rightside">
                       
                    </div>
                </div>
                <form method="POST" action="update.php">
                    <div class="container">
                        <p align="right">
                            <input type="button" value="Back" class="btn btn-primary" onclick="history.back()" />
                        </p>
                        <h1><b>Update Admin Data</b></h1>
                        <hr>
                        <input type="hidden" placeholder="Enter Name" name="id" id="name"
                            value="<?php echo $row['id'];?>" required>
                        <label><b>Name:</b></label>
                        <input type="text" placeholder="Enter Name" name="name" id="name"
                            value="<?php echo $row['name'];?>" required>

                        <label><b>Gender:</b></label>
                        <input type="radio" name="gender" id="gender" value="male"
                            <?php echo $row['gender']=="male"?"checked=checked":""; ?> required>Male
                        <input type="radio" name="gender" id="gender" value="female"
                            <?php echo $row['gender']=="female"?"checked=checked":""; ?> required>Female

                        <br><br><label><b>Hobbies:</b></label><br>
                        <input type="checkbox" id="hobbies" name="hobbies[]" value="Cricket"
                            <?php if(in_array("Cricket",explode(",",$row['hobbies']))) {echo "checked";} ?>>Cricket<br />
                        <input type="checkbox" id="hobbies" name="hobbies[]" value="Singing"
                            <?php if(in_array("Singing",explode(",",$row['hobbies']))) {echo "checked";} ?>>Singing<br />
                        <input type="checkbox" id="hobbies" name="hobbies[]" value="Swimming"
                            <?php if(in_array("Swimming",explode(",",$row['hobbies']))) {echo "checked";} ?>>Swimming<br />
                        <input type="checkbox" id="hobbies" name="hobbies[]" value="Shopping"
                            <?php if(in_array("Shopping",explode(",",$row['hobbies']))) {echo "checked";} ?>>Shopping<br />


                        <br><label><b>Email:</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email"
                            value="<?php echo $row['email'];?>" required>

                        <label><b>Password:</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password"
                            value="<?php echo $row['password'];?>" required>



                        <button type="submit" name="submit" class="registerbtn">Update</button>
                    </div>


                </form>

            </header>
        </div>
        <div class="user-dashboard">

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  
</body>

</html>