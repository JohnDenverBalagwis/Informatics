<?php
include "classes/database.php";

$judges = new database();

$candidates = $judges->mysqli->query("SELECT * FROM female_candidates ORDER BY candidate_number ASC");

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

        <h3 class="title-category">Production Number Female 25%</h3>
    </nav>

    <div class="main-container">


        <form class="scoring-container" method="post" style="border-radius: 0;">
            <table class="table table-striped candidate-table">
                <thead>
                    <tr>
                        <th style="padding: 0;">Candidate No.</th>
                        <th>Candidate Name</th>
                        <th>Poise and Bearing
                            <br>
                            <p class="fst-italic fw-lighter">30%</p>
                        </th>
                        <th>Fitness
                            <br>
                            <p class="fst-italic fw-lighter">30%</p>
                        </th>
                        <th>Uniqueness and Style
                            <br>
                            <p class="fst-italic fw-lighter">40%</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $candidates = $judges->mysqli->query("SELECT * FROM female_candidates ORDER BY candidate_number ASC");

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
                            <input style="width: 4.6rem;" class="candidate-input form-control mx-auto oneHundred" type="number" name="poise-and-bearing<?php echo $row['id']; ?>" required>
                        </td>
                        <td>
                            <input style="width: 4.6rem;" class="candidate-input form-control mx-auto oneHundred" type="number" name="fitness<?php echo $row['id']; ?>" required>
                        </td>
                        <td>
                            <input style="width: 4.6rem;" class="candidate-input form-control mx-auto oneHundred" type="number" name="uniqueness-and-style<?php echo $row['id']; ?>" required>
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

</body>

</html>