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
function create($name, $about_me, $biography) {
    print_r ($_GET);
    
    $SQL = "INSERT INTO heroes (name, about_me, biography) 
            VALUES ('$name', '$about_me', '$biography')";
    echo $SQL;
}


// codeanywhere.bhalbkah.com/Hero_API/Hero.php?action=read
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case "create":
            create($name, $about_me, $biography);
            break;
        case "read":
            echo "read thing";
            break;
        case "update":
            echo "updated thing";
            break;
        case "delete":
            echo "deleted thing";
            break;    
        default:
            echo "init thing";
    }
}
else{
    // action not set, do something
}
