<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$pathToImages = '../images/userIcons/';

// get image full address
$json = file_get_contents("php://input");
$data = json_decode($json, true);
$imageAddress = $data['imageAddress'];

//set image address to be the directory address 
$file_pointer = basename($imageAddress) . PHP_EOL;
$file_pointer = $file_pointer . '.png';

$old = getcwd(); // Save the current directory
echo getcwd();
chdir($pathToImages);
echo getcwd();
//unlink($file_pointer);
chdir($old); // Restore the old working directory   

if (unlink($file_pointer)) {

    // set response code - 410 deleted
    http_response_code(410);

    // tell the user
    echo json_encode(array("message" => $file_pointer . "cannot be deleted due to an error"));
} else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete user."));
}
