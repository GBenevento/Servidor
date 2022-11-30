<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class Film
{
 // Properties

 public $id;

 public $title;

 public $year;

 public $length;

 public $category;

 public $image;

 public $votes;

 public $synopsis;

 public $directos;

 public $cast;


 // Construct method

 public function __construct()
 {

 }

 // Database method

public function getDataDB()
{

    //First we connect to the DB
    $conn = mysqli_connect("localhost", "root", "12345");
    if ($conn->connect_error) 
    {
        die("Connection failed: ". $conn->connect_error);
    }
    mysqli_select_db($conn, "practica_cartelera");

    //Select the films from the correct category
    $category_id = $_POST['category_id'];
    $sanitized_category_id = mysqli_real_escape_string($conn, $category_id);
    $query = "SELECT * FROM Films_T where category_id=' .$sanitized_category_id.' ORDER BY votes DESC; ";
    $result = mysqli_query($conn, $query);

    //Analyze results
    if(!result)
    {

    }
    else
    {          
        
        //Tenemos que devolver array de películas en orden de votos


        if(($result->num_rows)>0)
        {
            while($register = mysqli_fetch_assoc($result))
            {
                $this->id = $register["id"];
                $this->title = $register["title"];
                $this->year = $register["year"];
                $this->length = $register["length"];
                $this->category = $register["category"];
                $this->image = $register["image"];
                $this->synopsis = $register["synopsis"];
                $this->directors = $register["directors"];
                $this->cast = $register["cast"];
                $this->votes = $register["votes"];
            }
        }
    }
}



}