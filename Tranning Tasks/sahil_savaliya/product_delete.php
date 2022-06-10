<?php
session_start();
require 'dbconnect.php';


$did=$_GET['id'];
  $query = "SELECT * FROM product where id = '$did'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  $row = mysqli_fetch_assoc($data);
  if($row == 0){
      echo "No Data available";
  }
  else
  {
      $sql = "DELETE FROM product WHERE id='$did'";
      if ($conn->query($sql) === TRUE) {
        unlink("image/".$row['Image']);
        header('location: index.php');
      } else {
      echo "Error deleting record: " . $conn->error;
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script type="text/javascript">
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");


        if (confirm('Are you sure to remove this record ?')) {
            $.ajax({
                url: '/delete.php',
                type: 'GET',
                data: {
                    id: id
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    $("#" + id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    });
    </script>
</body>

</html>