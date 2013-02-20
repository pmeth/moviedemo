<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
if (!empty($_GET['message'])) {
   echo "<div class='message'><span>$_GET[message]</span></div>";
}
?>
<div class="navigation">
	<a href='add.php'>Add Movie</a>
</div>
<?php

$res = $db->query('select * from movies');

while($row = $res->fetch_assoc()) {
  if (empty($row['image'])) {
    $row['image'] = 'http://dummyimage.com/91x136/000/fff?text=No+Image';
  }

  if (empty($row['year'])) {
    $row['year'] = 'Unknown';
  }
	$starson = str_repeat('&#9733', $row['rating']);
 	$starsoff = str_repeat('&#9733', 5 - $row['rating']);
  echo "<a class='listitem' href='detail.php?id=$row[id]'>";
  echo "<img height='136' src='$row[image]' alt='$row[title]'>";
  echo "<div class='title'>$row[title] <span class='year'>($row[year])</span></div>";
  echo "<div class='date-added'>Date Added: $row[date_added]</div>";
  echo "<div class='rating'><span class='starson'>$starson</span><span class='starsoff'>$starsoff</span></div>";
  echo "</a>";
}

require 'includes/footer.php';
