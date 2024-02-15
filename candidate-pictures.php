<?php
    include "classes/database.php";

    $judges = new database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/candidate-pictures.css?<?php echo time(); ?>">
</head>

<body>
    <div class="">
        <nav class="upper-logo">
            <figure class="logo">
                <img src="images/info logo.png" alt="logo">
            </figure>
            <div class="name">
                <div class="informatics">Informatics</div>
                <div class="college">COLLEGE</div>
            </div>
        </nav>
        <a class="vote-btn" href="image-slider.php">Vote Now.</a>
        <div class="candidate-list">

        <div class="container">
        <?php
            $male_candidates = $judges->mysqli->query("select * from male_candidates ORDER BY candidate_number ASC");


            while ($row = mysqli_fetch_assoc($male_candidates)) {
        ?>
            <div class="candidate">
                <div class="candidate-image">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="candidate">
                </div>
                <div class="candidate-details">
                    <div class="candidate-name"><?php echo $row['name']; ?></div>
                    <div class="candidate-position"><?php echo $row['candidate_number']; ?></div>
                </div>
            </div>
        <?php } ?>
        </div>


        <div class="container">
        <?php
        
            $female_candidates = $judges->mysqli->query("select * from female_candidates ORDER BY candidate_number ASC");

            while ($row = mysqli_fetch_assoc($female_candidates)) {
        ?>
            <div class="candidate female-candidate">
                <div class="candidate-image">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="candidate">
                </div>
                <div class="candidate-details">
                    <div class="candidate-name"><?php echo $row['name']; ?></div>
                    <div class="candidate-position"><?php echo $row['candidate_number']; ?></div>
                </div>
            </div>

        <?php } ?>
        </div>

    </div>
</body>

</html>