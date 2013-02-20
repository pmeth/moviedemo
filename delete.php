<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
?>
<div class="navigation">
	<a class='addnew' href='detail.php?id=<?php echo $_GET['id']; ?>'>Return</a>
</div>
<?php
$id = (int) $_GET['id'];
$res = $db->query('SELECT * FROM movies WHERE id = ' . $id);

$row = $res->fetch_assoc();
?>
<h3>Are you sure you want to delete <?php echo $row['title']; ?>?</h3>
<form action="delete_handler.php" method="post" id="add_movie">
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   <div class="field">
      <label for="submit">&nbsp;</label>
      <input type="submit" name="submit" id="submit" value="Yes">
      <input type="submit" name="submit" id="cancel" value="Cancel">
   </div>

</form>

<?php
require 'includes/footer.php';
