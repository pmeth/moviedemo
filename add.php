<?php
require 'includes/bootstrap.php';
require 'includes/header.php';
?>
<a class='addnew' href='index.php'>Return</a>
         <div class="clearfix"></div>
         <form action="add_handler.php" method="post" id="add_movie">
            <div class="field">
               <label for="title">Title</label><input name="title" id="title">
            </div>
            <div class="field">
               <label for="year">Year</label><input name="year" id="year">
            </div>
            <div class="field">
               <label for="image">Image</label><input name="image" id="image">
            </div>
            <div class="field">
               <label for="rating">Rating</label>
               <input type="radio" name="rating" value="1" id="rating_1">1
               <input type="radio" name="rating" value="2" id="rating_2">2
               <input type="radio" name="rating" value="3" id="rating_3">3
               <input type="radio" name="rating" value="4" id="rating_4">4
               <input type="radio" name="rating" value="5" id="rating_5">5
            </div>
            <div class="field">
               <label for="submit">&nbsp;</label>
               <input type="submit" name="submit" id="submit" value="Add Title">
            </div>

         </form>
<?php
require 'includes/footer.php';