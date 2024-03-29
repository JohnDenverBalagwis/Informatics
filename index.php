<?php 
include "classes/database.php";

$judges = new database();

session_start();

if (isset($_COOKIE['name'])) {
    header("location: candidate-pictures.php");
}

$invalidJudge = false;
$judgeAlreadyOccupied = false;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $name = $judges->select('judges', '*', ['username'=>$username]);

    if (mysqli_fetch_assoc($name)['occupied'] == 0) {
        $judges->updateData('judges', ['occupied'=>1], ['username'=>$username]);

        setcookie('name', $username, time() + (7 * 24 * 60 * 60));

        // $_SESSION['name'] = $username;

        header("location: candidate-pictures.php");
    }else {
        $judgeAlreadyOccupied = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5ad1518180.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cover-page.css">
    <link rel="shortcut icon" href="images/infor.png" type="image/x-icon">
    <title>Informatics</title>

    <style>
        #popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #002e57;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(204, 204, 204, 0.3);
        color: white;
        z-index: 9;
        }
    </style>
</head>

<body>
    <form method="post" class="container">
        <nav class="upper-logo" style="cursor: default;">
            <figure class="logo">
                <img src="images/info logo.png" alt="logo">
            </figure>
            <div class="name">
                <div class="informatics">Informatics</div>
                <div class="college">COLLEGE</div>
                <input type="submit" name="submit" class="get-started-btn" value="Get Started">
            </div>
        </nav>
        <div class="hero-container">
            <div class="hero-wrapper">
                <div class="images-wrapper">
                    <img id="ms" src="images/Mr. & Ms. (1).png" alt="hero-image">
                </div>
                <div class="main-content">
                    <h3 class="search">Search for </h3>
                    <h2 class="mrandms">Mr & Ms</h2>
                    <h1 class="icon">Icon</h1>
                </div>


                <select name="username" id="Username" style=" cursor: pointer;">
                    <option value="judge 1">Judge 1</option>
                    <option value="judge 2">Judge 2</option>
                    <option value="judge 3">Judge 3</option>
                    <option value="judge 4">Judge 4</option>
                    <option value="judge 5">Judge 5</option>
                </select>

                <!-- <input name="username" type="text" placeholder="Username" id="Username" required> -->

            </div>
        </div>
    </form>

    
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
    </script>


    <?php

        if ($invalidJudge) {
            echo "<script>showPopup('Invalid Username');</script>";
        } else if ($judgeAlreadyOccupied) {
            echo "<script>showPopup('Judge Already Occupied');</script>";
        }
      
    ?>
  
</body>

</html>