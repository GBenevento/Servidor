<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/categories.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Cartelera</title>

</head>
<body>
    <div class="large_container">
        <div class="title">
        <a  href="categories.php">
            <h2>Billboard</h2>
        </a>
        </div>

        <div class="container">

        <?php

            require 'film_class.php';

            $film = new Film();
            try
            {
                $film->updateVotes();

            } catch (Exception $e) {

                echo 'Caught exception: ', $e->getMessage(), "<br>";
            }
       
        ?>

        </div>

</body>
</html>