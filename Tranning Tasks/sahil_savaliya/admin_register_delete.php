<?php
	include 'dbconnect.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

	$sql = "DELETE FROM `login_admin` WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
        echo"Deleted";
	 header("location:admin_register_view.php");
	exit();
    } 
	else {
		
	}
	mysqli_close($conn);
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