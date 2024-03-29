<?php
  include "classes/database.php";


  $admin = new database();

  $admin->mysqli->query("DELETE FROM female_candidates;");
  $admin->mysqli->query("DELETE FROM male_candidates;");

  $admin->updateData('judges', ['occupied'=>'0'], ['username'=>'judge 1']);
  $admin->updateData('judges', ['occupied'=>'0'], ['username'=>'judge 2']);
  $admin->updateData('judges', ['occupied'=>'0'], ['username'=>'judge 3']);
  $admin->updateData('judges', ['occupied'=>'0'], ['username'=>'judge 4']);
  $admin->updateData('judges', ['occupied'=>'0'], ['username'=>'judge 5']);

  setcookie('name', '', time() - 3600);

  header("location: list-of-female-candidates.php?dataDestroyed");

?>