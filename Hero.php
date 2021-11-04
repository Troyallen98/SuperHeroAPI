<?php
// connect to database
// switch for a route
// run a CRUD functino
//      inside function, check for errors
//      inside function, access database for the CRUD function - run a mySQL query
//      inside function, return result of query
// echo data to api on postman
// close connection 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SQL_Hero";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// define functions
function create(){

    $name = $_POST['name'];
    $about_me = $_POST['about_me'];
    $biography = $_POST['biography'];
    $SQL = "INSERT INTO heroes (name, about_me, biography) 
            VALUES ('$name', '$about_me', '$biography')";

    global $conn;

    if ($conn->query($SQL) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $SQL . "<br>" . $conn->error;
    }
}
function read()
{

    $SQL = "SELECT name, about_me, biography FROM heroes";

    global $conn;

    $result = $conn->query($SQL);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo " - Name: " . $row["name"] . " " . $row["about_me"] . $row["biography"] . " " . "<br>";
        }
    } else {
        echo "0 results";
    }
}

function update()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $about_me = $_POST['about_me'];
    $biography = $_POST['biography'];
    $SQL = "UPDATE heroes SET name='$name', about_me='$about_me', biography='$biography' WHERE heroes.id = $id";

    global $conn;

    if ($conn->query($SQL) === TRUE) {
        echo "record updated successfully";
    } else {
        echo "Error: " . $SQL . "<br>" . $conn->error;
    }
}

function delete()
{
    $id = $_GET['id'];
    $SQL = "DELETE FROM heroes WHERE heroes.id = $id";

    global $conn;

    if ($conn->query($SQL) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $SQL . "<br>" . $conn->error;
    }
}

// codeanywhere.bhalbkah.com/Hero_API/Hero.php?action=read
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case "create":
            create($name, $about_me, $biography);
            break;
        case "read":
            read();
            break;
        case "update":
            update($name, $about_me, $biography, $id);
            break;
        case "delete":
            delete();
            break;
        default:
            echo "init thing";
    }
} else {
    // action not set, do something
}








// class DatabaseConnector {
//    private $servername = "localhost";
//    private $username = "root";
//    private $password = "";
//    private $dbname = "SQL_Hero";
//    private $conn;
//    private $heroes;
   
//     function connect() {
//         $this->conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbname);
//     }

//     function disconnect() {
//        $this->conn->close();
//     }

//     function getAllHeroes() {
    
//         $this->connect();
//         $SQL = "SELECT * FROM heroes";
//         $result = $this->conn ->query($SQL);

//         if($result->num_rows > 0) {
//             while($row = $result->fetch_assoc()) {
//                 $heroObj = [];
//                 array_push($this->heroes, $heroObj);
//             }
//         } else {
//             $this ->heroes = [];
//         }
//         $this->disconnect();
//         return $this->heros;
//     }
    

// }


//  function runSQL($sql){
//         // run the sql command
//     }
//     function getAllHeroes($sql){
//         $results = null;

//         //


//         return $results;