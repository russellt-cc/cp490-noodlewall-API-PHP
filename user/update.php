<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);

// get user id
$json = file_get_contents("php://input");

$data = json_decode($json, true);

// set user id to be updated
$user->userID = $data['userID'];

// set user property values
$user->userID = $data['userID'];
$user->userName = $data['userName'];
$user->userFirstName = $data['userFirstName'];
$user->userLastName = $data['userLastName'];
$user->userRating = $data['userRating'];
$user->userBio = $data['userBio'];
$user->userBioLong = $data['userBioLong'];
$user->userImage = $data['userImage'];


// update the event
if ($user->update()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "user was updated."));
}

// if unable to update the event, tell the user
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update user."));
}
?>