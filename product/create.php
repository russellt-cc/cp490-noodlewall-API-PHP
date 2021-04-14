<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// get posted data
$json = file_get_contents("php://input");

$data = json_decode($json, true);

// make sure required data is not empty
if(
    !empty($data['noodleTitle']) &&
    !empty($data['userID']) &&
    !empty($data['noodleStatus']) &&
    !empty($data['noodleDescription']) &&
    !empty($data['noodleTags'])
){
  
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

    // $product->created = date('Y-m-d H:i:s');

    // create the product
    if($product->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
  
// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user 
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>