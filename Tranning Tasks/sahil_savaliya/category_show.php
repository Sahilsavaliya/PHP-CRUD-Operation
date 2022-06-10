<?php 
session_start();
@$email = $_SESSION['email1'];
@$usertype = $_SESSION['utype'];

if(!$user == 1 || !$user == 2) {
    header('location:login.php');
}


?>
<html> 
    <head>
        <title>Dashboard</title>
        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
                        <link href="css/dashboard.css" rel="stylesheet" id="bootstrap-css">
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
                        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
                        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


    </head>

<body class="home">
    <!-- <div class="container-fluid display-table"> -->
        <!-- <div class="row display-table-row"> -->
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="category.php"><i class="" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Add Category</span></a></li>
                       

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
                        <?php
    include 'dbconnect.php';
    // session_start();
    $query="SELECT * FROM category";
    $result=mysqli_query($conn,$query);

    ?>
    <hr>
    <h3 style="text-align: center;"><a><?=$email ?></a></h3>
    <h1 style="text-align: center;"><b> Display Category </b></h1>
    </td>



    <section class="ftco-section">
        <div class="container">
            <p align="right">
                <input type="button" value="Back" class="btn btn-primary" onclick="history.back()" />
            </p>
           

            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-wrap">
                        <table class="table" width="100%">
                            <thead class="thead-primary">
                                <tr>

                                    <td class="tabcon"><b>ID</b></td>
                                    <td class="tabcon"><b>Name</b></td>
                                    <td class="tabcon"><b>Active</b></td>
                                    <?php if($usertype == "1" || $usertype == "2"){
                                    ?>
                                    <td class="tabcon"><b>Update</b></td>
                                    <td class="tabcon"><b>Delete</b></td>
                                    <?php } ?>




                                    <?php
                                    // session_start();
                                    if (mysqli_num_rows($result) > 0) {
                                        //echo "true..";
                                        while ($row = mysqli_fetch_assoc($result)) {



                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="alert" role="alert">


                                    <td class="tabcon"><?php echo $row['id'] ?></td>
                                    <td class="tabcon"><?php echo $row['name'] ?></td>
                                    <td class="tabcon"><?php echo $row['active'] ?></td>
                                    <?php if($usertype == "1" || $usertype == "2"){
                                    ?>
                                    <td class="tabcon"><a href="category_edit.php?id=<?php echo $row['id']; ?>"
                                            title="Edit"><button class="btn btn-success">Edit</button></a>
                                    </td>
                                    <td class="tabcon"><a href="category_delete.php?id=<?php echo $row['id']; ?>"
                                            onclick="return confirm('Are you sure want to delete?')"
                                            title="delete"><button class="btn btn-danger">Delete</button></a>
                                    </td>



                                </tr>
                            </tbody>
                            </tr>

                            <?php
                                    }
                                        }
                                    } else {
                                        echo "0 row found...";
                                    }
                    ?>
                        </table><br><br>
                    </header>
                </div>
                <div class="user-dashboard">
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->

    <!-- </div> -->

    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>