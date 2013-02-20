<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
?>
<div class="navigation">
	<a href='index.php'>Return</a> |
	<a href='edit.php?id=<?php echo $_GET['id']; ?>'>Edit</a> |
	<a href='delete.php?id=<?php echo $_GET['id']; ?>'>Delete</a>
</div>
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
$starson = str_repeat('&#9733', $rating);
$starsoff = str_repeat('&#9733', 5 - $rating);
echo "<div class='detail'>";
echo "<img height='450' src='$image' alt='$title'>";
echo "<div class='title'>$title <span class='year'>($year)</span></div>";
echo "<div class='date-added'>Date Added: $date_added</div>";
echo "<div class='rating'><span class='starson'>$starson</span><span class='starsoff'>$starsoff</span></div>";
echo "<div class='clearfix'></div>";
echo "</div>";

require 'includes/footer.php';
