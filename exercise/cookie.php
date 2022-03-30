<?php
setcookie("unique", "dsfsdf", time() + 3600, '/');
?>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
  print_r($_COOKIE['unique']);
} else {
  echo "Cookies are disabled.";
}
?>