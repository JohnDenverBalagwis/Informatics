<?php 
include "classes/database.php";

$judges = new database();

session_start();


$judgeDoesntExist = false;

if (isset($_POST['submit'])) {
    $username = mysqli_escape_string($judges->mysqli, $_POST['username']);

    if ($judges->isExisted('judges', ['username'=>$username])) {

        $name = $judges->select('judges', '*', ['username'=>$username]);

        $_SESSION['name'] = mysqli_fetch_assoc($name)['username'];


        header("location: candidate-pictures.php");

    } else {
        $judgeDoesntExist = true;
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
        <nav class="upper-logo">
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
                <input name="username" type="text" placeholder="Username" id="Username" required>

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

        echo "<script>showPopup('Invalid Username');</script>";
      
    ?>

</body>

</html>