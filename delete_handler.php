<?php
require 'includes/bootstrap.php';

if ($_POST['submit'] != 'Yes') {
   header('Location: detail.php?id=' . $_POST['id']);
   exit;
}

$stmt = $db->prepare('DELETE FROM movies WHERE id=?');
$stmt->bind_param('i', $_POST['id']);
$stmt->execute();

header('Location: index.php?message=Successfully deleted Movie with ID ' . $_POST['id']);