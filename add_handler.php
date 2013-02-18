<?php
require 'includes/bootstrap.php';

$stmt = $db->prepare('INSERT INTO movies (title, year, image, rating, date_added) VALUES (?, ?, ?, ?, NOW())');
$stmt->bind_param('sisi', $_POST['title'], $_POST['year'], $_POST['image'], $_POST['rating']);
$stmt->execute();

header('Location: index.php?message=Successfully Inserted Movie with ID ' . $db->insert_id);