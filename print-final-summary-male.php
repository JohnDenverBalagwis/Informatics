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

        header("location: final-ranking-male.php");
    }


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

    <style>
                
        .qa-nav:hover {
            background-color: rgb(0,90,215) !important;
        }
    </style>
    <title>List of Candidates</title>

</head>

<body>


    <div id="main">
        <div id="title">final summary of male candidates</div>




        <div class="box">


        <h4 class="text-center fw-bold pt-3">Question and Answer</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $qa_final_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM qa_male ORDER BY judge_name DESC");

                        while ($row = mysqli_fetch_assoc($qa_final_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $qa_final_result = $admin->mysqli->query("SELECT DISTINCT male_candidate_id FROM qa_male WHERE spontaneity > 0 ORDER BY judge_name DESC, male_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($qa_final_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('male_candidates', $row['male_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM qa_male WHERE male_candidate_id = $row[male_candidate_id] ORDER BY judge_name DESC");

                                    while ($row2 = mysqli_fetch_assoc($judges_score)) {
                                ?>
                                <td><?php echo average($row2['spontaneity'], $row2['substance'], $row2['delivery']); ?></td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </tbody>
            </table>


        </div>

    </div>


    <script>
        window.print();
    </script>
</body>

</html>