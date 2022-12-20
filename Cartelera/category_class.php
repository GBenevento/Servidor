<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class Category
{
// Properties

    public $id;

    public $name;

    public $image;

    // Construct method

    public function __construct()
    {

    }

    public function getDataDB()
    {
        $conn = mysqli_connect("localhost", "root", "12345");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn, "films");

        $query = "SELECT * FROM t_categories";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            $message = 'Invalid query: ' . mysqli_error($conexion) . "\n";
            die($message);
        } else {
            if (($result->num_rows) > 0) {
                while ($register = mysqli_fetch_assoc($result)) {
                    $this->id = $register["ID"];
                    $this->name = $register["name"];
                    $this->image = $register["image"];

                    $this->showCategory();
                }
            }
        }
    }

    public function showCategory()
    {
        echo '   
            <div class="category">
            <a href="films.php?category_id='. $this->id .'&category='.strtolower($this->name) .'">
            <img src="imgs/'.$this->image.'.jpg" alt="'.$this->name.'">
            <span class="name">'.$this->name.'</span>

            </a>
            </div>
        ';
    }

}
