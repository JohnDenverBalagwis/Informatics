<?php
include "classes/database.php";

$admin = new database();

function calculateAverage($id) {
    $admin = new database();


    $total = 0;
    $dividedBy = 0;

    $production_number = $admin->select('male_production_number', '*', ['male_candidate_id'=>$id]);
    $casual_wear = $admin->select('male_casual_wear', '*', ['male_candidate_id'=>$id]);
    $sports_wear = $admin->select('male_sports_wear', '*', ['male_candidate_id'=>$id]);
    $formal_attire = $admin->select('male_formal_attire', '*', ['male_candidate_id'=>$id]);

    while ($row = mysqli_fetch_assoc($production_number)) {
        $total += ($row['fitness'] + $row["poise_and_bearing"] + $row['uniqueness_and_style']);

        $dividedBy++;
    }

    while ($row = mysqli_fetch_assoc($casual_wear   )) {
        $total += ($row['poise_and_bearing'] + $row["fitness"] + $row['stage_deportment']);

        $dividedBy++;
    }

    while ($row = mysqli_fetch_assoc($sports_wear)) {
        $total += ($row['poise_and_bearing'] + $row['stage_deportment'] + $row['fitness']);

        $dividedBy++;
    }

    while ($row = mysqli_fetch_assoc($formal_attire)) {
        $total += ($row['poise_and_bearing'] + $row['stage_presence'] + $row['fitness_and_style'] + $row['elegance']);

        $dividedBy++;
    }

    if ($dividedBy != 0) {
        return number_format($total / $dividedBy, 2);
    }


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

        .progress {
            background: #ddd;
            height: 30px;
            width: 400px;
            border-radius: 15px;
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
        <div id="title">ranking of male candidates</div>

        <div class="box d-flex align-items-center pt-3">

            <?php
                $candidates = $admin->select('male_candidates', '*');

                while ($row = mysqli_fetch_assoc($candidates)) {

                $percentage = calculateAverage($row['id']);

            ?>

            <div style="display: flex; align-items: center; justify-content: space-between; gap: 15px; width: 40rem;">  
                <h5 style="position: relative; top: 1px;"><?php echo $row['name']; ?></h5>
                <div class="progress my-4" role="progressbar" aria-label="Animated striped example" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?php echo $percentage; ?>%"> <?php echo $percentage; ?>%</div>
                </div>
            </div>
            

            <?php } ?>

        </div>

    </div>




</body>

</html>