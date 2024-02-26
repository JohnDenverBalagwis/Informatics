<?php
    include "classes/database.php";
    include "calculate.php";

    $admin = new database();

    $result_table = array();

    
    if (isset($_POST['submit'])) {
        $winner_candidates = $admin->mysqli->query("SELECT * FROM male_candidates ORDER BY score DESC limit 5");

        while ($row = mysqli_fetch_assoc($winner_candidates)) {
            $admin->updateData('male_candidates', ['winner'=>'qualified'], ['id'=>$row['id']]);
        }

        $winner_candidates_female = $admin->mysqli->query("SELECT * FROM female_candidates ORDER BY score DESC limit 5");

        while ($row = mysqli_fetch_assoc($winner_candidates_female)) {
            $admin->updateData('female_candidates', ['winner'=>'qualified'], ['id'=>$row['id']]);
        }

        header("location: final-ranking-female.php");
    }



    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/5ad1518180.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/infor.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <style>

        * {
            font-size: .8rem;
        }
                
    .qa-nav:hover {
        background-color: rgb(0,90,215) !important;
    }
    </style>

    <title>Print Summary Female</title>

</head>

<body>


    <div id="main">
        <div id="title">summary of female candidates</div>


        <div class="box">



            <h4 class="text-center fw-bold pt-3">Production Number</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $production_number_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM female_production_number ORDER BY judge_name DESC");

                        while ($row = mysqli_fetch_assoc($production_number_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $production_number_result = $admin->mysqli->query("SELECT DISTINCT female_candidate_id FROM female_production_number ORDER BY judge_name DESC, female_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($production_number_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('female_candidates', $row['female_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM female_production_number WHERE female_candidate_id = $row[female_candidate_id] ORDER BY judge_name DESC");

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
                        $casual_wear_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM female_casual_wear ORDER BY judge_name DESC");

                        while ($row = mysqli_fetch_assoc($casual_wear_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $casual_wear_result = $admin->mysqli->query("SELECT DISTINCT female_candidate_id FROM female_casual_wear ORDER BY judge_name DESC, female_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($casual_wear_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('female_candidates', $row['female_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM female_casual_wear WHERE female_candidate_id = $row[female_candidate_id] ORDER BY judge_name DESC");

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
                        $sports_wear_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM female_sports_wear ORDER BY judge_name DESC");

                        while ($row = mysqli_fetch_assoc($sports_wear_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $sports_wear_result = $admin->mysqli->query("SELECT DISTINCT female_candidate_id FROM female_sports_wear ORDER BY judge_name DESC, female_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($sports_wear_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('female_candidates', $row['female_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM female_sports_wear WHERE female_candidate_id = $row[female_candidate_id] ORDER BY judge_name DESC");

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
                        $formal_attire_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM female_formal_attire ORDER BY judge_name DESC");

                        while ($row = mysqli_fetch_assoc($formal_attire_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $formal_attire_result = $admin->mysqli->query("SELECT DISTINCT female_candidate_id FROM female_formal_attire ORDER BY judge_name DESC, female_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($formal_attire_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('female_candidates', $row['female_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM female_formal_attire WHERE female_candidate_id = $row[female_candidate_id] ORDER BY judge_name DESC");

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

        <script>
        window.print();
    </script>
</body>

</html>