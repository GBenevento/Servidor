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

    public $categoryID;

    public $image;

    public $votes;

    public $synopsis;

    public $directors = [];

    public $cast = [];

    // Construct method

    public function __construct()
    {

    }

    // Database method

    public function getDataDB()
    {
        //First we connect to the DB
        $conn = mysqli_connect("localhost", "root", "12345");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn, "films");

        //Select the films from the correct category
        $categoryID = $_GET['category_id'];
        $sanitized_category_id = mysqli_real_escape_string($conn, $categoryID);
        $query = "SELECT * FROM t_films where category_id=" .$sanitized_category_id." ORDER BY votes DESC;";
        $result = mysqli_query($conn, $query);

        //Analyze results
        if (!$result) {
            $message = 'Invalid query: ' . mysqli_error($conexion) . "\n";
            die($message);
        } else {

            if (($result->num_rows) > 0) {
                echo '<div class="large_conatiner '.$_GET['category'].'">
                <div class="nav">
                <ul>
                    <li class="not-active"><a  href="categories.php"><h1>Categories</h1></a></li>
                    <li class="active"><a  href="films.php?category_id='.$_GET['category_id'].'&category='.$_GET['category'].'"><h1>'. ucfirst($_GET['category']).'</h1></a></li>
                </ul>
            </div>';
                while ($register = mysqli_fetch_assoc($result)) {
                    echo '<div class="ticket">';
                    $this->id = $register["ID"];
                    $this->title = $register["title"];
                    $this->year = $register["release_year"];
                    $this->length = $register["length_minutes"];
                    $this->image = $register["image"];
                    $this->synopsis = $register["synopsis"];
                    $this->votes = $register["votes"];

                    $this->createTicket();
                    
                }
            }
        }
    }

    public function createTicket()
    {
        echo '
            <div class="top">
                <div class="poster">
                    <img src="imgs/'.$this->image.'.jpg" alt="'.$this->title.'">
                </div>
                <div class="content">
                    <div class="top-row">
                        <h1>'.$this->title.'</h1>
                        <span class="votes">Votes: '.$this->votes.'</span>
                       
                    </div>
                    <div class="synopsis">
                        <p>'.$this->synopsis.'</p>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <span>Length: '.$this->length.' minutes</span>
                <div class="button">
                    <a href="sheet.php?film='.$this->id.'">
                        <button type="button">Film Sheet</button> 
                    </a>
                </div>
            </div>
        </div>';
    }

    public function getFilm(){
        //First we connect to the DB
        $conn = mysqli_connect("localhost", "root", "12345");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn, "films");

        //Select the films from the correct category
        $filmID = $_GET['film'];
        $sanitized_filmID = mysqli_real_escape_string($conn, $filmID);
        $query = "SELECT * FROM t_films where id=" .$sanitized_filmID."";
        $result = mysqli_query($conn, $query);

        //Analyze results
        if (!$result) {
            $message = 'Invalid query: ' . mysqli_error($conexion) . "\n";
            die($message);
        } else {
            while ($register = mysqli_fetch_assoc($result)) 
            {
                $this->id = $register["ID"];
                $this->title = $register["title"];
                $this->year = $register["release_year"];
                $this->length = $register["length_minutes"];
                $this->categoryID = $register["category_id"];
                $this->image = $register["image"];
                $this->synopsis = $register["synopsis"];
                $this->votes = $register["votes"];
            }
            if (($result->num_rows) > 0) {
                $query = "SELECT t_directors.name FROM t_directors WHERE t_directors.ID IN 
                (SELECT t_directors_films.director_id FROM t_directors_films WHERE film_id =".$sanitized_filmID.");";

                $directors = mysqli_query($conn, $query);
                if (($directors->num_rows) > 0) {
                    while ($director = mysqli_fetch_assoc($directors)) {
                        array_push($this->directors, $director["name"]);
                    }      
                } 

                $query = "SELECT t_actors.name FROM t_actors WHERE t_actors.ID IN 
                (SELECT t_actors_films.actor_id FROM t_actors_films WHERE film_id =".$sanitized_filmID.");";

                $actors = mysqli_query($conn, $query);
                if (($actors->num_rows) > 0) {
                    while ($actor = mysqli_fetch_assoc($actors)) {
                        array_push($this->cast, $actor["name"]);
                    }    
                } 
                $this->createSheet();
            }

        }
    }

    public function createSheet(){
        echo '
        <div class="large-conatiner">
            <div class="nav">
                <ul>
                    <li class="not-active"><a  href="categories.php"><h1>Categories</h1></a></li>
                    <li class="active"><a  href="sheet.php?film='.$_GET['film'].'"><h1>'. $this->title.'</h1></a></li>
                </ul>
            </div>

            <div class="container">
                <div class="poster">
                    <img src="imgs/'.$this->image.'.jpg" alt="'.$this->title.'">
                </div>
                <div class="content">
                    <div class="title">
                        <h1>'.$this->title.'</h1>
                    </div>
                    <div class="synopsis">
                        <p>'.$this->synopsis.'</p>
                    </div>
                    <div class="people">
                        <div class="directors">
                            <h2>Directors</h2>
                            <ul>';
                        for ($i=0; $i < count($this->directors); $i++) { 
                            echo '<li>'. $this->directors[$i] .'</li>';
                        }
                        echo'
                            </ul>                        
                        </div>
                        <div class="cast">
                            <h2>Cast</h2>
                            <ul>';
                        for ($i=0; $i < count($this->cast); $i++) { 
                            echo '<li>'. $this->cast[$i] .'</li>';
                        }
                        echo'
                            </ul> 
                        </div>
                    </div>
                    <div class="votes">
                        <span>Votes: '.$this->votes.'</span>
                        <form action="vote.php?film='.$this->id.'" method="POST">
                        <div class="button">
                        <input type="hidden" name="film" id="film" value="'.$this->id.'" />
                            <button type="submit">+</button> 
                        </div>
                    </div>
                </div>
        </div>
        </div>
        ';
    }

    public function updateVotes()
    {
        $conn = mysqli_connect("localhost", "root", "12345");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn, "films");

        $filmID = $_POST['film'];
        $sanitized_filmID = mysqli_real_escape_string($conn, $filmID);
        $query = "UPDATE t_films SET votes = (votes + 1) WHERE ID = ".$sanitized_filmID. ";";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            $message = 'Invalid query: ' . mysqli_error($conexion) . "\n";
            die($message);
        }else{
            echo '
            <div class="thanks">
                <h1>Thank you for voting</h1>
            </div>
            ';
        }
    }

}