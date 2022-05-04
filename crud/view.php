<?php 
if(! isset($_SESSION)) {
    session_start();
}if(!($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script>

</script>

</script>

    <script defer="" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0cmFja3MlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyVGFibGUlMjAwNiUyMiUyQyUyMnclMjIlM0ExNTM2JTJDJTIyaCUyMiUzQTg2NCUyQyUyMmolMjIlM0E3NTQlMkMlMjJlJTIyJTNBMTUzNiUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZib290c3RyYXAlMkZ0YWJsZS0wNiUyRiUyMiUyQyUyMnIlMjIlM0ElMjIlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTMzMCU3RA=="></script>
    <script nonce="0dbb1351-023f-4476-8b7a-600fccbf984e"></script>
    <script type="text/javascript" src="js/bootstrap/viewjs.js"></script>
    <title>View Database</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.q2AVU534B4.css">
    <link rel="stylesheet" type="text/css" href="css/view.css">
   

</head>

<body>
<?php
    include 'dbconnect1.php';
    // session_start();
    $query="SELECT * FROM table1";
    $result=mysqli_query($conn,$query);

    ?>

<h1 style="text-align: center;"> Display Records </h1></td>

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
                                    <!-- <td class="tabcon"><b>Country</b></td> -->
                                    <td class="tabcon"><b>Update</b></td>
                                    <td class="tabcon"><b>Delete</b></td>
                                    
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
                                    <td class="tabcon"><?php echo $row['fname'] ?></td>
                                    <td class="tabcon"><?php echo $row['lname'] ?></td>
                                    <td class="tabcon"><?php echo $row['gender'] ?></td>
                                    <td class="tabcon"><?php echo $row['contact'] ?></td>
                                    <td class="tabcon"><?php echo $row['email'] ?></td>
                                    <td class="tabcon"><?php echo $row['designation'] ?></td>
                                    <td class="tabcon"><?php echo $row['age'] ?></td>
                                    <td class="tabcon"><?php echo $row['password'] ?></td>
                                    <td class="tabcon"><?php echo $row['file'] ?></td> 
                                    <!-- <td class="tabcon"><?php echo $row['country'] ?></td> -->
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
                        <td class="tabcon"><a href="logout.php"onclick="return confirm('Are you sure want to logout?')"><button style="background-color: red;">Logout</button></a></td>

                        <?php
$thelist = "";
  if ($handle = opendir('upload')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<li><p>Download file <a href="download.php?file=' . $file . '">'.$file.'</a></p></li>';
        $thelist .= '<li><p>Delete file <a href="deletefile.php?file=' . $file . '">'.$file.'</a></p></li>';
        $thelist .= '<p>--------------------------------------';
      }
    }
    closedir($handle);
  }
?>
<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon="{&quot;rayId&quot;:&quot;6f150a492c2e8af3&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2021.12.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


</body>

</html>