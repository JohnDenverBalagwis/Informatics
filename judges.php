<?php 
include "classes/database.php";

$admin = new database();

$judgeExist = false;

if (isset($_POST['submit'])) {
    $name = mysqli_escape_string($admin->mysqli, $_POST['name']);

    if ($admin->isExisted('judges', ['username'=>$name])) {
        $judgeExist = true;
    } else {
        $admin->insertData('judges', ['username'=>$name]);
    }
} else if (isset($_POST['delete'])) {
    
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

        <a style="background-color: #555;" href="judges.php"><i class="fa-regular fa-user"></i>Judges</a>

            <div class="dropdown">
                <a onclick="myFunction()" class="dropbtn"><i class="fa-regular fa-user"></i>Candidates <i class="fa-solid fa-angle-down"></i></a>
                <div id="myDropdown" class="dropdown-content">
                    <a href="list-of-male-candidates.php">Mr.</a>
                    <a href="list-of-female-candidates.php">Ms.</a>
                </div>
            </div>

            <div class="dropdown">
                <a onclick="myFunction2()" class="dropbtn"><i class="fa-solid fa-square-poll-vertical"></i>votes/rankings <i class="fa-solid fa-angle-down"></i></a>

                <div id="myDropdown2" class="dropdown-content2">
                    <a href="ranking-male.php">Mr.</a>
                    <a href="ranking-female.php">Ms.</a>
                </div>
            </div>

            <div class="dropdown">
                <a onclick="myFunction3()" class="dropbtn"><i class="fa-solid fa-square-poll-vertical"></i>Summary <i class="fa-solid fa-angle-down"></i></a>

                <div id="myDropdown3" class="dropdown-content3">
                    <a href="summary-male.php">Mr.</a>
                    <a href="summary-female.php">Ms.</a>
                </div>
            </div>

        </div>
    </div>

    <div id="main">
        <div id="title">list of female candidates</div>



        <div class="box" style="max-width: 36rem;">
          <button id="myBtn" class="add-candidate-button">
            Add
          </button>

          <table class="table table-striped" style="border-top: 1px solid rgb(90, 90, 90)">
            <thead>
              <tr>
                <th>Name</th>
                <th style="width: 2rem;">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $judges = $admin->select('judges', '*');
                    
                    while ($row = mysqli_fetch_assoc($judges)) {
                ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td>

                                              <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" style="font-size: .7rem; padding: 2px 5px" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>">
                        Delete
                      </button>

                      <!-- Modal -->

                      <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Warning!</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="margin:0; text-align: center;">
                              Are you Sure You want to Delete?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary"  style="font-size: .7rem; padding: 2px 5px" data-bs-dismiss="modal">Cancel</button>
                              <a class="btn btn-danger" style="font-size: .7rem; padding: 2px 5px" href="delete-judge.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>



                    </td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>

    </div>

    
    <div id="myModal" class="modal">
        <div class="modal-body">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h4>Add Judges</h4>
            </div>

            <form method="post" class="modal-main-content">
                <div class="modal-inputs">
                    <label for="">Name:</label>
                    <input class="form-control" type="text" name="name" required>
                </div>
    
                <div class="modal-buttons">
                    <span id="cancel">Cancel</span>
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form >
        </div>
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
    </script>




    <?php
      if ($judgeExist) {
        echo "<script>showPopup('judge already exist');</script>";
      } else if (isset($_GET['deleted'])) {
        echo "<script>showPopup('judge deleted');</script>";
      }
    ?>

</body>

</html>