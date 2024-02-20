<?php
include "classes/database.php";

$admin = new database();

$id = $_GET["id"];

$admin->deleteRow('judges', "id = $id");

header("location: judges.php?deleted");

?>