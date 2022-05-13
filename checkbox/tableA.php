<?php
include('dbconnect.php');
include ('function.php');
//$query = mysqli_query($conn,"select * from tablea ORDER BY checkbox_data ASC");
    $calltoaction=new insertdata();

    if (isset($_POST['swap1'])){
       
        $calltoaction->insert($value,'tableb','tablea','checkbox_data');
        echo"Done";
        // exit;
    }

    if (isset($_POST['swap2']))
    {
        $data = $_POST['check'];
        $calltoaction->insert($value,'tablea','tableb','checkbox_data');
    }
    $totaldata=$calltoaction->getdata('tablea','tableb');
    $query=$totaldata['data'];
    $query1=$totaldata['data1'];
?>
<?php
session_start();
?>
<html>
<head>
<body>
    <?php
    if(isset($_SESSION['status']))
    {
        echo "<h4>".$SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
    ?>
    
        <h1>Table A</h1>
        <form method="POST" action="">
            <table border="1">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        echo "<td> <input type='checkbox' name='check[]' value='".$row['checkbox_data']."'></td><td>".$row['checkbox_data']." </td>" ;
                        echo "</tr>";
                    }
                    echo "</table>";

                ?>
                </br>
                <input type="submit" name="swap1" id="swap1" value="Swap to B">
        </form>

</body>
</head>
</html>



    <?php
    //$query1 = mysqli_query($conn,"select * from tableb ORDER BY checkbox_data ASC");
    ?>

<html>
<body>
    <?php
    if(isset($_SESSION['status']))
    {
        echo "<h4>".$SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
    ?>
    
        <h1>Table B</h1>
        <form method="POST" action="">
            <table border="1">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query1))
                    {
                        echo "<tr>";
                        echo "<td> <input type='checkbox' name='check[]' value='".$row['checkbox_data']."'></td><td>".$row['checkbox_data']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </br>
                <input type="submit" name="swap2" id="swap2" value="Swap">
                </form>
        <?php
            mysqli_close($conn);
        ?>
   

</body>
</html> 