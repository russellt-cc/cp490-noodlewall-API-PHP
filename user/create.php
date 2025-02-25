<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate user object
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// get posted data
$json = file_get_contents("php://input");

$data = json_decode($json, true);

// make sure required data is not empty
if(
    !empty($data['userName']) &&
    !empty($data['userFirstName']) &&
    !empty($data['userLastName']) 
){
  
    // set user property values
    $user->userName = $data['userName'];
    $user->userFirstName = $data['userFirstName'];
    $user->userLastName = $data['userLastName'];
    $user->userRating = $data['userRating'];
    $user->userBio = $data['userBio'];
    $user->userBioLong = $data['userBioLong'];
    $user->userImage = $data['userImage'];

    $ID = $user->create();

    // create the user
      if($ID !== false){
  
        // set response code - 201 created
        http_response_code(201);
  
        // return the newly created user
        echo json_encode(array("message" => "User was created.", "userID" => $ID));

    }
  
    // if unable to create the event, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create user."));
    }
}
  
// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user 
    echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
}
?>