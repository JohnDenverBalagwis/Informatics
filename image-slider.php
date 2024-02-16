<?php ?>


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
                    <div>
                        <h1 class="candidate-number">1</h1>
                        <img src="images/image1.jpg" alt="Image 1">
                        <h3 class="candidate-name">Neil Andrei Monroyo</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">2</h1>
                        <img src="images/image2.jpg" alt="Image 2">
                        <h3 class="candidate-name">candidate </h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">3</h1>
                        <img src="images/image3.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 3</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">4</h1>
                        <img src="images/image4.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 4</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">5</h1>
                        <img src="images/image5.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 5</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                    <div>
                        <h1 class="candidate-number">6</h1>
                        <img src="images/image6.jpg" alt="Image 3">
                        <h3 class="candidate-name">candidate 6</h3>
                    </div>
                </div>
                <button class="prev" onclick="prevSlide()">Prev</button>
                <button class="next" onclick="nextSlide()">Next</button>
            </div>
        </div>

        <div class="criteria-container">
            <h5>Criteria for Judging</h5>
            <div class="criteria-inputs">
                <label class="form-label" for="">Poise and Bearing (30%)</label>
                <input class="form-control" type="number" min="0" max="100">
            </div>
            <div class="criteria-inputs">
                <label class="form-label" for="">Stage Presence (25%)</label>
                <input class="form-control" type="number" min="0" max="100">
            </div>            
            <div class="criteria-inputs">
                <label class="form-label" for="">Fitness and Style (25%)</label>
                <input class="form-control" type="number" min="0" max="100">
            </div>            
            <div class="criteria-inputs" style="border-bottom: 2px solid black; padding-bottom: 8px;">
                <label class="form-label" for="">Elegance (20%)</label>
                <input class="form-control" type="number" min="0" max="100">
            </div>

            <div class="total-wrapper">
                <label for="">Total</label>
                <div class="total-inputs">
                    <input class="form-control" type="number" min="0" max="100">
                    <input class="btn btn-primary" type="submit" value="submit">
                </div>
            </div>
        </div>
    </div>
</body>

</html>