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
    <link rel="stylesheet" href="css/image-slider.css?<?php echo time(); ?>">
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

        <h3 class="title-category">sports attire 25%</h3>
    </nav>

    <div class="main-container">
        <div class="main-content">
            <div class="slider-container">
                <div class="slider">
                    <?php
                        $candidates = $judges->mysqli->query("SELECT * FROM male_candidates ORDER BY candidate_number ASC");

                        while ($row = mysqli_fetch_assoc($candidates)) {
                    ?>
                    <div>
                        <h1 class="candidate-number"><?php echo $row['candidate_number'] ?></h1>
                        <img src="uploads/<?php echo $row['image']; ?>" alt="Image 1">
                        <h3 class="candidate-name"><?php echo $row['name']; ?></h3>
                    </div>
                    <?php } ?>

                </div>
                <button class="prev" onclick="prevSlide()">Prev</button>
                <button class="next" onclick="nextSlide()">Next</button>
            </div>
        </div>

        <form class="scoring-container">
            <table class="table table-striped candidate-table">
                <thead>
                    <tr>
                        <th>Candidate Name</th>
                        <th>Poise and Bearing</th>
                        <th>Fitness</th>
                        <th>Uniqueness and Style</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $candidates = $judges->mysqli->query("SELECT * FROM male_candidates ORDER BY candidate_number ASC");

                        while ($row = mysqli_fetch_assoc($candidates)) {
                    ?>
                    <tr>
                        <td>
                            <h5 class="text-start"><?php echo $row['name']; ?></h5>
                        </td>
                        <td>
                            <input style="width: 3.8rem;" class="candidate-input form-control mx-auto thirty" type="number" name="poise-and-bearing" required>
                        </td>
                        <td>
                            <input style="width: 3.8rem;" class="candidate-input form-control mx-auto thirty" type="number" name="fitness" required>
                        </td>
                        <td>
                            <input style="width: 3.8rem;" class="candidate-input form-control mx-auto forty" type="number" name="uniqueness-and-style" required>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <input class="btn btn-primary" type="submit">

        </form>
    </div>


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

        limitInput('twenty', 20);
        limitInput('twentyFive', 25);
        limitInput('thirty', 30);
        limitInput('forty', 40);
        limitInput('thirtyFive', 35);
        limitInput('oneHundred', 100);



    </script>
</body>

</html>