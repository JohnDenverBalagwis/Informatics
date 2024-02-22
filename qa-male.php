<?php

include "classes/database.php";

$judges = new database();

session_start();

$name = $_SESSION['name'];

$candidates = $judges->mysqli->query("SELECT * FROM male_candidates ORDER BY candidate_number ASC");

if (isset($_POST['submit'])) {
    while ($row = mysqli_fetch_assoc($candidates)) {
        $id = $row['id'];

        $spontaneity = $_POST["spontaneity$id"];
        $substance = $_POST["substance$id"];
        $delivery = $_POST["delivery$id"];

        $judges->insertData('qa_male', ['male_candidate_id'=>$id, 'judge_name'=>$name, 'spontaneity'=>$spontaneity, 'substance'=>$substance, 'delivery'=>$delivery]);
    }

    header("location: thank-you.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/image-slider.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
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

        <h3 class="title-category">question and answer portion male 100%</h3>
    </nav>

    <div class="main-container">
        <div class="main-content">
            <div class="slider-container">
                <div class="slider">
                    <?php

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

        <form class="scoring-container" method="post">
            <table class="table table-striped candidate-table">
                <thead>
                    <tr>
                        <th style="padding: 0;">Candidate No.</th>
                        <th>Candidate Name</th>
                        <th>Spontaneity
                            <br>
                            <p class="fst-italic fw-lighter">30%</p>
                        </th>
                        <th>Substance
                            <br>
                            <p class="fst-italic fw-lighter">40%</p>
                        </th>
                        <th>Delivery
                            <br>
                            <p class="fst-italic fw-lighter">30%</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $candidates = $judges->mysqli->query("SELECT * FROM male_candidates ORDER BY candidate_number ASC");

                        while ($row = mysqli_fetch_assoc($candidates)) {
                    ?>
                    <tr>
                        <td>
                            <h5 class="fw-bold"><?php echo $row['candidate_number']; ?></h5>
                        </td>
                        <td>
                            <h5 class="text-start"><?php echo $row['name']; ?></h5>
                        </td>
                        <td>
                            <input style="width: 4.6rem;" class="candidate-input form-control mx-auto thirty" type="number" name="spontaneity<?php echo $row['id']; ?>" required>
                        </td>
                        <td>
                            <input style="width: 4.6rem;" class="candidate-input form-control mx-auto forty" type="number" name="substance<?php echo $row['id']; ?>" required>
                        </td>
                        <td>
                            <input style="width: 4.6rem;" class="candidate-input form-control mx-auto thirty" type="number" name="delivery<?php echo $row['id']; ?>" required>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Submit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body" style="margin: 0 auto;">
                        Are you Sure you Want to Submit?
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <input class="btn btn-primary" type="submit" name="submit" value="Yes">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <div id="popup">
      <p id="popupMessage"></p>
    </div>



    <script>
        function showPopup(message) {
            var popup = document.getElementById("popup");
            document.getElementById('popupMessage').innerHTML = message;
            popup.style.display = "block"; // Show the popup

            // Automatically close the popup after 2 seconds
            setTimeout(function() {
                popup.style.display = "none"; // Hide the popup
            }, 1500);
        }

                
            

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

        limitInput('thirty', 30);
        limitInput('forty', 40);





    </script>

    <?php 
        if (!isset($_SESSION['qa-male'])) {
            echo "<script>showPopup('Submitted Sucessfully');</script>";
            $_SESSION['qa-male'] = true;
        }
    ?>
</body>

</html>