<?php 
session_start();
if(!isset($_SESSION['email'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <script nonce="0dbb1351-023f-4476-8b7a-600fccbf984e"></script>
    <script type="text/javascript" src="js/bootstrap/viewjs.js"></script>
    <title> Display Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.q2AVU534B4.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/view.css">
   

</head>

<body>
<?php
    include 'dbconnect1.php';
    $query="SELECT * FROM table1";
    $result=mysqli_query($conn,$query);

    ?>

<h1 style="text-align: center;"><b> Display Records</b> </h1></td><hr>

<br>
<section class="ftco-section">
        <div class="container">
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
                                    <td class="tabcon"><b>FirstName</b></td>
                                    <td class="tabcon"><b>LastName</b></td>
                                    <td class="tabcon"><b>Gender</b></td>
                                    <td class="tabcon"><b>Contact</b></td>
                                    <td class="tabcon"><b>Email Address</b></td>
                                    <td class="tabcon"><b>Designation</b></td>
                                    <td class="tabcon"><b>Age</b></td>
                                    <td class="tabcon"><b>Password</b></td>
                                    <td class="tabcon"><b>file</b></td>
                                    <td class="tabcon"><b>Update</b></td>
                                    <td class="tabcon"><b>Delete</b></td>
                                    
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        //echo "true..";
                                        while ($row = mysqli_fetch_assoc($result)) {



                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="alert" role="alert">


                                    <td class="tabcon"><?php echo $row['id'] ?></td>
                                    <td class="tabcon"><?php echo $row['fname'] ?></td>
                                    <td class="tabcon"><?php echo $row['lname'] ?></td>
                                    <td class="tabcon"><?php echo $row['gender'] ?></td>
                                    <td class="tabcon"><?php echo $row['contact'] ?></td>
                                    <td class="tabcon"><?php echo $row['email'] ?></td>
                                    <td class="tabcon"><?php echo $row['designation'] ?></td>
                                    <td class="tabcon"><?php echo $row['age'] ?></td>
                                    <td class="tabcon"><?php echo $row['password'] ?></td>
                                    <td><a href="uploads/<?php echo $row['file'];?>"><?= $row['file']?></a></td>
                                    <td class="tabcon"><a href="edit.php?id=<?php echo $row['id']; ?>" title="Edit"><button style="background-color: skyblue;">Edit</button></a></td>
                                    <!-- <td class="tabcon"><a href="delete.php?id=</ ?php echo $row['id']; ?>" title="Delete"><button style="background-color: red;">Delete</button></a></td> -->
                                    <td class="tabcon"><a href="delete.php?id=<?php echo $row['id']; ?>"onclick="return confirm('Are you sure want to delete?')"title="delete"><button style="background-color: red;">Delete</button></a></td>
 


                                </tr>
                            </tbody>
                            </tr>

                    <?php
                                        }
                                    } else {
                                        echo "0 row found...";
                                    }
                    ?>
                        </table><br><br>
                        <td><a href="logout.php"
                                onclick="return confirm('Are you sure want to logout?')"><button type="button"
                                    class="btn btn-danger">Logout</button></td>
</body>

</html>