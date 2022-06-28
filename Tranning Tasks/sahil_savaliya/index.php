<?php 
session_start();
require 'dbconnect.php';
@$email=$_SESSION['email1'];
@$usertype=$_SESSION['utype'];
echo $usertype;

 ?>

<html>

<head>
    <title>Dashboard</title>
    <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo"
        class="visible-xs visible-sm circle-logo">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/dashboard.js"> </script>
    <link href="css/dashboard.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#department").on('change', function() {
            var value = $(this).val();
            $.ajax({
                url: "filter.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend: function() {
                    $("#table").html("<span>Working...</span>");
                },
                success: function(data) {
                    $("#table").html(data);
                }
            });
        });
    });
    </script>


</head>

<body class="home">
    <div class="container-fluid display-table">
    <div class="row display-table-row">
    <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
        <div class="logo">
        </div>
        <div class="navi">
            <ul>
                <li class="active"><a href=""><i class="fa fa-home" aria-hidden="true"></i><span
                            class="hidden-xs hidden-sm">Home</span></a></li>

                <li><a href="admin/category_show.php"><i class="" aria-hidden="true"></i><span
                            class="hidden-xs hidden-sm">Add
                            Category</span></a></li>
                <?php if($usertype == "1" || $usertype == "2"){
                                    ?>
                <li><a href="admin/product.php"><i class="" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Add
                            Product</span></a></li>
                <?php } ?>
                <li><a href="admin/admin_register_view.php"><i class="" aria-hidden="true"></i><span
                            class="hidden-xs hidden-sm">Users</span></a></li>

            </ul>
        </div>
    </div>
    <div class="col-md-10 col-sm-11 display-table-cell v-align">
        <div class="row">
            <header>
                <div class="col-md-7">
                </div>
                <div class="col-md-5">
                    <div class="header-rightside">
                        <ul class="list-inline header-top pull-right">
                            <?php
                                    if(!empty($email)) {
                                    ?>
                            <a href="admin/super_admin_logout.php"
                                onclick="return confirm('Are you sure want to logout?')"><button type="button"
                                    class="btn btn-danger">Logout</button>
                                <?php 
                                }else{
                                     ?>
                                <a href="admin/login.php"><button type="button" class="btn btn-primary">Login</button>
                                    <?php } ?>
                        </ul>
                    </div>
                </div>
                <hr>
                <h3 style="text-align: center;"><a><?= $email ?></a></h3>
                <h1 style="text-align: center; color: steelblue;"><b> Display Product </b></h1>

                <?php
    
    ?>

                <section class="ftco-section">
                    <div class="container">


                        <!-- <p align="right">
                <input type="button" value="Back" class="btn btn-primary" onclick="history.back()" />
            </p> -->

                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center mb-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="table-wrap">
                                    <table class="table" id="table" width="100%">
                                        <thead class="thead-primary">
                                            <tr>

                                                <td class="tabcon"><b>ID</b></td>
                                                <td class="tabcon"><b>Name</b></td>
                                                <td class="tabcon"><b>Category Id</b></td>
                                                <td class="tabcon"><b>Image</b></td>
                                                <td class="tabcon"><b>Created By User Id</b></td>
                                                <td class="tabcon"><b>Active</b></td>
                                                <?php if($usertype == "1" || $usertype == "2"){
                                    ?>
                                                <td class="tabcon"><b>Update</b></td>
                                                <td class="tabcon"><b>Delete</b></td>
                                                <?php } ?>

                                                <?php
                                                include 'dbconnect.php';
                                                $query = "SELECT p.id, p.pname, c.name,a.email,p.active,p.Image FROM product p INNER JOIN category c ON p.category_id = c.id INNER JOIN login_admin a ON p.created_by_user = a.email where c.active= 'yes' and p.active='yes'"; 
                                                    $result=mysqli_query($conn,$query);
                                                if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
    

                                    ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="alert" role="alert">


                                                <td class="tabcon"><?php echo $row['id'] ?></td>
                                                <td class="tabcon"><?php echo $row['pname'] ?></td>
                                                <td class="tabcon"><?php echo $row['name'] ?></td>
                                                <td class="tabcon"><img src="image/<?php echo $row['Image'] ?>"
                                                        height="90px;" width="90px;" border-radius:15px; /></td>

                                                <td class="tabcon"><?php echo $row['email']?></td>
                                                <td class="tabcon"><?php echo $row['active'] ?></td>

                                                <?php if($usertype == 1 || $usertype == 2){
                                    ?>
                                                <td class="tabcon"><a
                                                        href="admin/product_edit.php?id=<?php echo $row['id']; ?>"
                                                        title="Edit"><button class="btn btn-success">Edit</button></a>
                                                </td>
                                                <td class="tabcon"><a
                                                        href="admin/product_delete.php?id=<?php echo $row['id']; ?>"
                                                        onclick="return confirm('Are you sure want to delete?')"
                                                        title="delete"><button id="button11" class="btn btn-danger"
                                                            title="Delete">Delete</button></a>
                                                </td>




                                            </tr>
                                        </tbody>
                                        </tr>

                                        <?php
                                    }      
                                    } 
                                }else {
                                        echo "0 row found...";
                                    }
                    ?>

                                        <select class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                            type="button" name="" department" id="department" class="form-control"
                                            id="depart_dropdown">
                                            <option value="">All</option>

                                            <?php
								require('dbconnect.php');
                                $query="SELECT * FROM category";
                                $result=mysqli_query($conn,$query);
                            ?>
                                            <?php
                                   if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                  ?>


                                            <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?>
                                            </option>


                                            <?php
                                   }
                                      } 
                                ?>
                                        </select>
                                        <br><br>
                                    </table>

                                    <div class="row"><br></div>
                                    <div class="row" id='employee_div'>


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