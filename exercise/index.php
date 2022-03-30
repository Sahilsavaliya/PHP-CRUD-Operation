<?php
//include 'test.php';
echo "<pre>";
//print_r($_SERVER);
//exit;
?>
<?php
$cars = array("Volvo"=>array("0"=>array("X"=>"deep")), "creta", "hondacity"); 

echo "<pre>";
print_r($cars);
echo "</pre>";
echo print_r($cars['Volvo'][0]);
echo "I like" . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";

?>



