<?php
session_start();

unset($_SESSION['email1']);
unset($_SESSION['utype']);
header('location:../index.php');

?>