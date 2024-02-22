<?php
    include "classes/database.php";
    include "calculate.php";

    $admin = new database();

    $result_table = array();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/5ad1518180.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>

    <title>List of Candidates</title>

</head>

<body>
    <div id="sidebar">
        <div class="upper-logo">
            <figure class="logo">
                <img src="images/infor.png" alt="logo">
            </figure>
            <div class="name">
                <div class="informatics">Informatics</div>
                <div class="college">COLLEGE</div>
            </div>
        </div>

        <div class="nav-links">

            <a href="judges.php"><i class="fa-regular fa-user"></i>Judges</a>


            <div class="dropdown">
                <a onclick="myFunction();" class="dropbtn"><i class="fa-regular fa-user"></i>Candidates <i class="fa-solid fa-angle-down"></i></a></a>
                <div id="myDropdown" class="dropdown-content">
                    <a href="list-of-male-candidates.php">Mr.</a>
                    <a href="list-of-female-candidates.php">Ms.</a>
                </div>
            </div>

            <div class="dropdown">
                <a onclick="myFunction2();" class="dropbtn"><i class="fa-solid fa-square-poll-vertical"></i>votes/rankings <i class="fa-solid fa-angle-down"></i></a></a>

                <div id="myDropdown2" class="dropdown-content2">
                    <a href="ranking-male.php">Mr.</a>
                    <a href="ranking-female.php">Ms.</a>
                </div>
            </div>


            <div class="dropdown">
              
                <a onclick="myFunction3();" class="dropbtn"><i class="fa-solid fa-square-poll-vertical"></i>Summary <i class="fa-solid fa-angle-down"></i></a></a>

                <div id="myDropdown3" class="dropdown-content3">
                  <a href="summary-male.php">Mr.</a>
                  <a href="summary-female.php">Ms.</a>
                </div>
            </div>

        </div>
    </div>

    <div id="main">
        <div id="title">list of male candidates</div>



        <div class="box">



            <h4 class="text-center fw-bold pt-3">Production Number</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $production_number_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM male_production_number");

                        while ($row = mysqli_fetch_assoc($production_number_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $production_number_result = $admin->mysqli->query("SELECT DISTINCT male_candidate_id FROM male_production_number ORDER BY judge_name DESC, male_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($production_number_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('male_candidates', $row['male_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM male_production_number WHERE male_candidate_id = $row[male_candidate_id] ORDER BY judge_name DESC");

                                    while ($row2 = mysqli_fetch_assoc($judges_score)) {
                                ?>
                                <td><?php echo average($row2['poise_and_bearing'], $row2['fitness'], $row2['uniqueness_and_style']); ?></td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </tbody>
            </table>



            <h4 style="border-top: 2px dashed black;"  class="text-center fw-bold mt-3 pt-3">Casual Wear</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $casual_wear_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM male_casual_wear");

                        while ($row = mysqli_fetch_assoc($casual_wear_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $casual_wear_result = $admin->mysqli->query("SELECT DISTINCT male_candidate_id FROM male_casual_wear ORDER BY judge_name DESC, male_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($casual_wear_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('male_candidates', $row['male_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM male_casual_wear WHERE male_candidate_id = $row[male_candidate_id] ORDER BY judge_name DESC");

                                    while ($row2 = mysqli_fetch_assoc($judges_score)) {
                                ?>
                                <td><?php echo average($row2['poise_and_bearing'], $row2['fitness'], $row2['stage_deportment']); ?></td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </tbody>
            </table>




            
            <h4 style="border-top: 2px dashed black;"  class="text-center fw-bold mt-3 pt-3">Sports Wear</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $sports_wear_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM male_sports_wear");

                        while ($row = mysqli_fetch_assoc($sports_wear_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $sports_wear_result = $admin->mysqli->query("SELECT DISTINCT male_candidate_id FROM male_sports_wear ORDER BY judge_name DESC, male_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($sports_wear_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('male_candidates', $row['male_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM male_sports_wear WHERE male_candidate_id = $row[male_candidate_id] ORDER BY judge_name DESC");

                                    while ($row2 = mysqli_fetch_assoc($judges_score)) {
                                ?>
                                <td><?php echo average($row2['poise_and_bearing'], $row2['stage_deportment'], $row2['fitness']); ?></td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </tbody>
            </table>




                        
            <h4 style="border-top: 2px dashed black;" class="text-center fw-bold mt-3 pt-3">Formal Attire</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $formal_attire_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM male_formal_attire");

                        while ($row = mysqli_fetch_assoc($formal_attire_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $formal_attire_result = $admin->mysqli->query("SELECT DISTINCT male_candidate_id FROM male_formal_attire ORDER BY judge_name DESC, male_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($formal_attire_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('male_candidates', $row['male_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM male_formal_attire WHERE male_candidate_id = $row[male_candidate_id] ORDER BY judge_name DESC");

                                    while ($row2 = mysqli_fetch_assoc($judges_score)) {
                                ?>
                                <td><?php echo average($row2['poise_and_bearing'], $row2['stage_presence'], $row2['fitness_and_style'], $row2['elegance']); ?></td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </tbody>
            </table>


        </div>

    </div>


</body>

</html>