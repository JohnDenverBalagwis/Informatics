<?php
include "classes/database.php";

$admin = new database();

$id = $_GET["id"];

$admin->delete('judges', $id);
header("location: judges.php?deleted");



?>