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
            <h2>Cartelera</h2>
        </div>

        <div class="container">

                  <?php
                        require 'category_class.php';

                        $category = new Category();

                        try
                        {
                            $category->getDataDB();

                        } catch (Exception $e) {

                            echo 'Caught exception: ', $e->getMessage(), "<br>";
                        }

?>

        </div>

</body>
</html>
