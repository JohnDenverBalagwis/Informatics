<?php
include "classes/database.php";

$admin = new database();

$id = $_GET["id"];
$url = $_GET['url'];

unlink('uploads/' . $url);
$admin->delete('male_candidates', $id);

header("location: index.php?deleted");

?>