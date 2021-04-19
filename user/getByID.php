<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
  
// instantiate database and user object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$user = new User($db);
  
// get keywords
$keywords=isset($_GET["id"]) ? $_GET["id"] : "";

// query users
if($stmt = $user->userByUserID($keywords)){
    
    // set response code - 200 OK
    http_response_code(200);
  
    // show user data
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no users found
    echo json_encode(
        array("message" => "No user found.")
    );
}
?>