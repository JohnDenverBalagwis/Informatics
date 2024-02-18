<?php 
include "classes/database.php";

$admin = new database();

$candidateNumber = $admin->select('male_candidates', '*')->num_rows + 1;

$candidateExist = false;
$candidateAdded = false;
$wrong_file = false;

if (isset($_POST['submit'])) {
  $candidate_number = $_POST['candidate-number'];
  $name = mysqli_escape_string($admin->mysqli, $_POST['name']);
  $age = mysqli_escape_string($admin->mysqli, $_POST['age']);
  $course = mysqli_escape_string($admin->mysqli, $_POST['course']);

  if ($admin->isExisted('male_candidates', ['name'=>$name])) {
    $candidateExist = true;
  } else if ($admin->checkIfImage('candidate-image')) {
    
      $admin->insertData('male_candidates', ['name'=>$name, 'age'=>$age, 'course'=>$course, 'candidate_number'=>$candidate_number]);
      $admin->insertImage('candidate-image', 'male_candidates', 'image', 'uploads/');


      $candidateAdded = true;
    } else {
      $wrong_file = true;
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
                <a onclick="myFunction()" class="dropbtn"><i class="fa-regular fa-user"></i>Candidates <i class="fa-solid fa-angle-down"></i></a></a>
                <div id="myDropdown" class="dropdown-content">
                    <a href="list-of-male-candidates.php">Mr.</a>
                    <a href="list-of-female-candidates.php">Ms.</a>
                </div>
            </div>

            <div class="dropdown">
                <a onclick="myFunction2()" class="dropbtn"><i class="fa-solid fa-square-poll-vertical"></i>votes/rankings <i class="fa-solid fa-angle-down"></i></a></a>

                <div id="myDropdown2" class="dropdown-content2">
                    <a href="/ranking-male.php">Mr.</a>
                    <a href="ranking-female.php">Ms.</a>
                </div>
            </div>

            <a href="#"> <i class="fa-solid fa-square-poll-vertical"></i> summary</a>
        </div>
    </div>

    <div id="main">
        <div id="title">list of male candidates</div>



        <div class="box">
          <button id="myBtn" class="add-candidate-button">
            Add
          </button>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Age</th>
                <th>Course</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php

                $candidates = $admin->mysqli->query("select * from male_candidates ORDER BY candidate_number ASC");

                  while ($row = mysqli_fetch_assoc($candidates)) {
                ?>
                <tr>
                  <td><?php echo $row['candidate_number']; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["age"]; ?></td>
                  <td><?php echo $row["course"]; ?></td>
                  <td><img src="uploads/<?php echo $row['image']; ?>" style="width: 5rem; cursor: pointer;" alt="candidate"></td>
                  <td>
                    <a class="btn btn-secondary" style="font-size: .7rem; padding: 2px 5px" href="edit-candidate.php?id=<?php echo $row['id']; ?>&sex=male">Edit</a>
                    
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
                              <a class="btn btn-danger" style="font-size: .7rem; padding: 2px 5px" href="delete-candidate.php?id=<?php echo $row['id']; ?>&url=<?php echo $row['image']; ?>&sex=male">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>


                  </td>
                </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
        </div>

    </div>

    <div id="myModal" class="modal">
        <div class="modal-body">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h4>Registration</h4>
            </div>

            <form method="post" class="modal-main-content" enctype="multipart/form-data">
                <div class="modal-inputs">
                    <label for="">Number:</label>
                    <input class="form-control" type="number" name="candidate-number" value="<?php echo $candidateNumber; ?>" required>
                </div>
                <div class="modal-inputs">
                    <label for="">Name:</label>
                    <input class="form-control" type="text" name="name" required>
                </div>
                <div class="modal-inputs">
                    <label for="">Age:</label>
                    <input class="form-control fifty" type="number" name="age" required>
                </div>
                <div class="modal-inputs">
                    <label for="">Course:</label>
                    <input class="form-control" type="text" name="course" required>
                </div>
                <div class="modal-inputs" class="input-group mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="candidate-image" id="inputGroupFile01" required>
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

    limitInput('fifty', 50);




    </script>
    

    <?php
      if ($candidateExist) {
        echo "<script>showPopup('candidate already exist');</script>";
      } else if ($candidateAdded) {
        echo "<script>showPopup('candidate added successfully');</script>"; 
      } else if ($wrong_file) {
        echo "<script>showPopup('upload only jpg, jpeg and png files');</script>";
      } else if (isset($_GET['deleted'])) {
        echo "<script>showPopup('candidate deleted successfully');</script>";
      }
    ?>

</body>

</html>