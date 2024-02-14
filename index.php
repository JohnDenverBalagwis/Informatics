<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/5ad1518180.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
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
                    <a href="#">Mr.</a>
                    <a href="#">Ms.</a>
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
        <div id="title">list of candidates</div>

        <div class="box">
            <button id="myBtn" class="add-candidate-button">
                <i class="fas fa-user-plus"></i> Add
            </button>
        </div>

    </div>


    <div id="myModal" class="modal">
        <div class="modal-body">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h4>Registration</h4>
            </div>
            <form method="post" class="modal-main-content">
                <div class="candidate-number">
                    <h5>Candidate #1</h5>
                </div>
                <div class="modal-inputs">
                    <label for="">Name:</label>
                    <input type="text">
                </div>
                <div class="modal-inputs">
                    <label for="">Age:</label>
                    <input type="text">
                </div>
                <div class="modal-inputs">
                    <label for="">Course:</label>
                    <input type="text">
                </div>
                <div class="modal-inputs">
                    <label >Upload Photo</label>
                    <input type="file">
                </div>
    
                <div class="modal-buttons">
                    <span id="cancel">Cancel</span>
                    <a href="">Submit</a>
                </div>
            </form >
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>