<html>
<head>
<title></title>
<link type="text/css" rel="stylesheet" href="css/base.css">
</head>
<body>
<div id="container">
<h2>My great movie list</h2>
<a class='addnew' href='add.php'>Add new title</a>
<div class="clearfix"></div>
<?php

require 'includes/bootstrap.php';

$res = $db->query('select * from movies');

while($row = $res->fetch_assoc()) {
  $staroff = '&#9734';
  $staron = '&#9733';
  $star = array(
    '1' => $staroff,
    '2' => $staroff,
    '3' => $staroff,
    '4' => $staroff,
    '5' => $staroff,
  );
  for ($i = 1; $i <= $row['rating']; $i++) {
    $star[$i] = $staron;
  }
  echo "<a class='listitem' href='detail.php?id=$row[id]'>";
  echo "<img src='$row[thumb]' alt='$row[title]'>";
  echo "<div class='title'>$row[title] <span class='year'>($row[year])</span></div>";
  echo "<div class='date-added'>Date Added: $row[date_added]</div>";
  echo "<div class='rating'>$star[1]$star[2]$star[3]$star[4]$star[5]</div>";
  echo "</a>";
}
?>
<div class="clearfix"></div>
</div>
</body>
</html>
