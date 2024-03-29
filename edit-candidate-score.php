<?php
  include "classes/database.php";

  session_start();

  $admin  = new database();

  $id = $_GET['id'];
  $sex = $_GET['sex'];

  $criteria = $admin->select($_GET['category'], '*', ['id'=>$id]);


  if (isset($_POST['submit'])) {
    while ($row = mysqli_fetch_assoc($criteria)) {

      foreach ($row as $key => $value) {
        if($key == 'id' || $key == "$_GET[sex]_candidate_id" || $key == 'judge_name') { 
        } else {

          $admin->updateData($_GET['category'], [$key=>$_POST["$key"]], ['id'=>$id]);

          header("location: summary-$sex.php");
        }}}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judge for QA</title>
    <link rel="stylesheet" href="css/image-slider.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/infor.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="image-slider.js" defer></script>
</head>

<body>
    <nav class="top-nav">
        <div class="logo-container">
            <img class="logo" src="images/info logo.png" alt="">
            <div class="logo-text">
                <h5>Informatics</h5>
                <h6>College</h6>
            </div>
        </div>
    </nav>


    <form method="post" class="modal-main-content mx-auto border border-subtle-black p-4 rounded-3" style="width: fit-content;">

        <h4 class="fw-bold">Edit Score for</h4>
        <h4 class="fw-bold"><?php echo $_GET['category']; ?></h4>


        <?php

          while ($row = mysqli_fetch_assoc($criteria)) {

            foreach ($row as $key => $value) {
              if($key == 'id' || $key == "$_GET[sex]_candidate_id" || $key == 'judge_name') { 

              } else {
        ?>

        <div class="modal-inputs" style="width: 20rem;">
            <label for=""><?php echo $key ?>:</label>
            <input class="form-control forty" style="width: 4rem;" type="number" name="<?php echo $key; ?>" value="<?php echo $value; ?>" required>
        </div>

        <?php } } } ?>

        
        <div class="modal-buttons">
            <a class="bg-danger rounded-1 text-decoration-none text-white" style="padding: 3px 9px;" id="cancel" href="summary-<?php echo $sex; ?>.php">Cancel</a>
            <input type="submit" name="submit" value="Submit">
        </div>

    </form >

 

    <script>
    function limitInput (cName, limit) {
        let limitTwenty = document.querySelectorAll(`.${cName}`);

        for (let i = 0; i < limitTwenty.length; i++) {
        // Add event listener to the input field
        limitTwenty[i].addEventListener('input', function() {
            // Get the current value of the input field
            let value = parseInt(limitTwenty[i].value);

            // Check if the value is greater than 30
            if (value > limit) {
                // If greater than 30, set the value to 30
                limitTwenty[i].value = limit;
            }
        });
        }
    }

    limitInput('forty', 40);

    </script>
</body>

</html>
