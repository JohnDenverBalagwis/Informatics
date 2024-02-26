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


            <div class="dropdown" style="background-color: #555;">
              
                <a onclick="myFunction3();" class="dropbtn"><i class="fa-solid fa-square-poll-vertical"></i>Summary <i class="fa-solid fa-angle-down"></i></a></a>

                <div id="myDropdown3" class="dropdown-content3">
                  <a href="summary-male.php">Mr.</a>
                  <a href="summary-female.php">Ms.</a>
                </div>
            </div>

        </div>
    </div>

    <div id="main">
        <div id="title">final summary of female candidates</div>


        <nav class="d-flex justify-content-center mb-3">
            <a style="border-right: 1px solid black;" class="qa-nav text-bg-primary py-1 px-2 rounded-1 text-decoration-none" href="summary-female.php">Elimination</a>
            <a class="qa-nav text-bg-primary py-1 px-2 rounded-1" href="final-summary-female.php">QA</a>
        </nav>

        <div class="text-end pe-1">
            <a class="btn btn-secondary mb-2" href="print-final-summary-female.php" target="_blank">Print</a>
        </div>

        <div class="box">



            <h4 class="text-center fw-bold pt-3">Question and Answer</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>contestant</th>
                    <?php
                        $qa_final_result = $admin->mysqli->query("SELECT DISTINCT judge_name FROM qa_female ORDER BY judge_name DESC");

                        while ($row = mysqli_fetch_assoc($qa_final_result)) {
                    ?>
                        <th><?php echo $row['judge_name'] ;?></th>
                    <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php
                            $qa_final_result = $admin->mysqli->query("SELECT DISTINCT female_candidate_id FROM qa_female WHERE spontaneity > 0 ORDER BY judge_name DESC, female_candidate_id DESC");

                            while ($row = mysqli_fetch_assoc($qa_final_result)) {
                        ?>
                            <tr>
                                <td><?php echo $admin->getName('female_candidates', $row['female_candidate_id'], "name"); ?></td>

                                <?php
                                    $judges_score = $admin->mysqli->query("SELECT * FROM qa_female WHERE female_candidate_id = $row[female_candidate_id] ORDER BY judge_name DESC");

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


</body>

</html>