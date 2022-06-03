<?php 
session_start();

if(!($_SESSION['email'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title> Display Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
<script>
        $(document).ready(function (){

    $("#department").on('change',function(){

        var value = $(this).val();

        $.ajax({

            url:"filter.php",

            type:"POST",

            data:'request=' + value,

            beforeSend:function(){

                $("#table").html("<span>Working...</span>");

            },

            success:function(data){

                $("#table").html(data);

            }

        });

    });

});

    </script>
</head>

<body>
    <hr>
    <h3 style="text-align: center;"><a><?=$_SESSION['email'] ?></a></h3>
    <hr>
    <h1 style="text-align: center;"><b> Display Product </b></h1>
    </td>

    <?php
    include 'dbconnect.php';
    $query="SELECT * FROM product";
    $result=mysqli_query($conn,$query);
    ?>

    <section class="ftco-section">
        <div class="container">
            

            <p align="right">
                <input type="button" value="Back" class="btn btn-primary" onclick="history.back()" />

            </p>
            <?php
            include 'dbconnect.php';

        if($_SESSION["email"]=='testuser@kcsitglobal.com'){  ?>
            <a class="btn btn-success" href="product.php" title="add">Add Product</a></td>
            <a class="btn btn-success" href="admin_register_view.php" title="add">Add Admin</a></td>
            <a class="btn btn-success" href="category_show.php" title="add_category">Add Category</a></td>
            <?php } ?>           
            
            
            <hr>
            

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
                                    <?php
                                    if($_SESSION["email"]=='testuser@kcsitglobal.com'){  ?>
                                    <td class="tabcon"><b>Update</b></td>
                                    <td class="tabcon"><b>Delete</b></td>
                                    <?php }  ?>





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
                                    <td class="tabcon"><?php echo $row['category_id'] ?></td>
                                    <td class="tabcon"><img src="image/<?php echo $row['Image'] ?>" height="90px;"
                                            width="90px;" border-radius:15px; /></td>
                                    <td class="tabcon"><?=$_SESSION['email'] ?></td>
                                    <td class="tabcon"><?php echo $row['active'] ?></td>

                                    <?php
                                    if($_SESSION["email"]=='testuser@kcsitglobal.com'){  ?>
                                    <td class="tabcon"><a href="product_edit.php?id=<?php echo $row['id']; ?>"
                                            title="Edit"><button style="background-color: skyblue;">Edit</button></a>
                                    </td>
                                    <!-- <td class="tabcon"><a href="delete.php?id=</ ?php echo $row['id']; ?>" title="Delete"><button style="background-color: red;">Delete</button></a></td> -->
                                    <td class="tabcon"><a href="product_delete.php?id=<?php echo $row['id']; ?>"
                                            onclick="return confirm('Are you sure want to delete?')"
                                            title="delete"><button style="background-color: red;">Delete</button></a>
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

                            <select name="department" id="department" class="form-control" style="width: 300px"; id="depart_dropdown">
							<option>---Select---</option>
							<?php
								require('dbconnect.php');
                                $query="SELECT * FROM category";
                                $result=mysqli_query($conn,$query);
                            ?>
                                            <?php
                                   if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                            
                            
                                            <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
                            
                            
                                            <?php
                                   }
                                      } 
                                ?>

			
						</select>
                        <br>
                        </table>
                        
                        <div class="row"><br></div>
		                <div class="row" id='employee_div'>

                        <td><a href="super_admin_logout.php"
                                onclick="return confirm('Are you sure want to logout?')"><button type="button"
                                    class="btn btn-danger">Logout</button></td>


</body>

</html>
