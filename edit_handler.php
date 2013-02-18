<?php
require 'includes/bootstrap.php';

$stmt = $db->prepare('UPDATE movies SET title=?, year=?, image=?, rating=? WHERE id=?');
$stmt->bind_param('sisii', $_POST['title'], $_POST['year'], $_POST['image'], $_POST['rating'], $_POST['id']);
$stmt->execute();

header('Location: index.php?message=Successfully updated Movie with ID ' . $_POST['id']);