<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$pathToImages = "../images/events/uploads/";

// get image full address
$json = file_get_contents("php://input");
$data = json_decode($json, true);
$imageAddress = $data['imageAddress'];

//set image address to be the directory address 
$file_pointer = $pathToImages .  basename($imageAddress);

clearstatcache();

//check if image exists
if (file_exists($file_pointer)) {

    //try to unlink(delete) image;
    if (unlink($file_pointer)) {

        // set response code - 410 deleted
        http_response_code(410);

        // tell the user
        echo json_encode(array("message" => $file_pointer . " deleted successfully"));
    } else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to delete user icon."));
    }
} else {
    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "File not found."));
}

?>