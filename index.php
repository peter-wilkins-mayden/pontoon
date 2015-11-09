<?php
require_once('play.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>

<?php
$scores = displayScores();
foreach($scores as $info){
  echo $info;
}

?>


</body>
</html>