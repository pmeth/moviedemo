<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
?>
<a class='addnew' href='index.php'>Return</a> |
<a class='addnew' href='edit.php?id=<?php echo $_GET['id']; ?>'>Edit</a> |
<a class='addnew' href='delete.php?id=<?php echo $_GET['id']; ?>'>Delete</a>
<div class="clearfix"></div>
<?php

$id = $_GET['id'];
$stmt = $db->prepare('SELECT title, year, image, rating, date_added FROM movies WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($title, $year, $image, $rating, $date_added);
$row = $stmt->fetch();
if (empty($image)) {
   $image = 'http://dummyimage.com/300x450/000/fff?text=No+Image';
}

if (empty($year)) {
   $year = 'Unknown';
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
for ($i = 1; $i <= $rating; $i++) {
  $star[$i] = $staron;
}
echo "<div class='detail'>";
echo "<img height='450' src='$image' alt='$title'>";
echo "<div class='title'>$title <span class='year'>($year)</span></div>";
echo "<div class='date-added'>Date Added: $date_added</div>";
echo "<div class='rating'>$star[1]$star[2]$star[3]$star[4]$star[5]</div>";
echo "</div>";

require 'includes/footer.php';