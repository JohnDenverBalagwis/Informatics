<?php
include "classes/database.php";

$admin = new database();

$id = $_GET["id"];
$url = $_GET['url'];

if ($_GET['sex'] == 'male') {
    unlink('uploads/' . $url);
    $admin->delete('male_candidates', $id);
    header("location: list-of-male-candidates.php?deleted");
} else if ($_GET['sex'] == 'female') {
    unlink('uploads/' . $url);
    $admin->delete('female_candidates', $id);
    header("location: list-of-female-candidates.php?deleted");

}


?>