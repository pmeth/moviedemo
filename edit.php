<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
?>
<div class="navigation">
<a href='detail.php?id=<?php echo $_GET['id']; ?>'>Return</a>
</div>
<?php
$id = (int) $_GET['id'];
$res = $db->query('SELECT * FROM movies WHERE id = ' . $id);

$row = $res->fetch_assoc();
?>
<form action="edit_handler.php" method="post" id="add_movie">
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   <div class="field">
      <label for="title">Title</label><input name="title" id="title" value="<?php echo $row['title']; ?>">
   </div>
   <div class="field">
      <label for="year">Year</label><input name="year" id="year" value="<?php echo $row['year']; ?>">
   </div>
   <div class="field">
      <label for="image">Image</label><input name="image" id="image" value="<?php echo $row['image']; ?>">
   </div>
   <div class="field">
      <label for="rating">Rating</label>
      <input type="radio" name="rating" value="1" id="rating_1" <?php if($row['rating'] == 1) { echo 'checked'; } ?>>1
      <input type="radio" name="rating" value="2" id="rating_2" <?php if($row['rating'] == 2) { echo 'checked'; } ?>>2
      <input type="radio" name="rating" value="3" id="rating_3" <?php if($row['rating'] == 3) { echo 'checked'; } ?>>3
      <input type="radio" name="rating" value="4" id="rating_4" <?php if($row['rating'] == 4) { echo 'checked'; } ?>>4
      <input type="radio" name="rating" value="5" id="rating_5" <?php if($row['rating'] == 5) { echo 'checked'; } ?>>5
   </div>
   <div class="field">
      <label for="submit">&nbsp;</label>
      <input type="submit" name="submit" id="submit" value="Update">
   </div>

</form>

<?php
require 'includes/footer.php';
