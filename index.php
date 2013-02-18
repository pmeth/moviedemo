<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
if (!empty($_GET['message'])) {
   echo "<div class='message'><span>$_GET[message]</span></div>";
}
?>
<a class='addnew' href='add.php'>Add Movie</a>
<div class="clearfix"></div>
<?php

$res = $db->query('select * from movies');

while($row = $res->fetch_assoc()) {
  if (empty($row['image'])) {
    $row['image'] = 'http://dummyimage.com/91x136/000/fff?text=No+Image';
  }

  if (empty($row['year'])) {
    $row['year'] = 'Unknown';
  }
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
  echo "<img height='136' src='$row[image]' alt='$row[title]'>";
  echo "<div class='title'>$row[title] <span class='year'>($row[year])</span></div>";
  echo "<div class='date-added'>Date Added: $row[date_added]</div>";
  echo "<div class='rating'>$star[1]$star[2]$star[3]$star[4]$star[5]</div>";
  echo "</a>";
}

require 'includes/footer.php';