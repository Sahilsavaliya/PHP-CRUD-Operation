<?php

include 'dbconnect.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_REQUEST['submit'])) {

    $name = $_POST["name"];

    $active = $_POST["active_data"];

    $edit = "UPDATE `category` SET `name`='$name',`active_data`='$active' WHERE `id`='$id'";

    $result1 = $conn->query($edit);

    if ($result1 == TRUE) {

        header("Location:category_show.php");

    } else {

        echo "Error:" . $edit . "<br>" . $conn->error;

    }

}

?>