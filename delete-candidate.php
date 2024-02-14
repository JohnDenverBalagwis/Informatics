<?php
include "classes/database.php";

$admin = new database();

$id = $_GET["id"];

$admin->delete('candidates', $id);

header("location: index.php?deleted");

?>