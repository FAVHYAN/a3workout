<?php
$message = $_POST['m'];
$session=$_POST['s'];
$username=$_POST['u'];

$filtered = ucwords($message) . " (web filter test - ucwords)";
$filtered = urlencode($filtered);

?>m=<?php echo $filtered; ?>