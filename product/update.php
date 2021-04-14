<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$product = new Product($db);

// get product id
$json = file_get_contents("php://input");

$data = json_decode($json, true);
  
// set product id to be deleted
$product->noodleID = $data['noodleID'];

// set product property values
$product->noodleID = $data['noodleID'];
$product->noodleTitle = $data['noodleTitle'];
$product->userID = $data['userID'];
$product->noodleStatus = $data['noodleStatus'];
$product->noodleDescription = $data['noodleDescription'];
$product->noodleTags = $data['noodleTags'];
$product->noodleImage = $data['noodleImage'];
$product->noodleLocation = $data['noodleLocation'];
$product->noodleDate = $data['noodleDate'];
$product->noodleTime = $data['noodleTime'];
$product->noodlePrice = $data['noodlePrice'];
$product->noodleMinTickets = $data['noodleMinTickets'];
$product->noodleMaxTickets = $data['noodleMaxTickets'];
$product->noodleTicketsSold = $data['noodleTicketsSold'];
$product->noodleCutoff = $data['noodleCutoff'];


// update the product
if ($product->update()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Product was updated."));
}

// if unable to update the product, tell the user
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update product."));
}
