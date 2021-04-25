<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    //toggle between these connections when deploying to online remote api / local api 
    //all it changes is the path returned to the function call
        //set the remote path to image
        // $pathOrigin = "http://35.182.244.152/noodlewall/";

        //set the local path to image
        $pathOrigin = "http://localhost/noodlewall/";


//get the image uploaded
$file = $_FILES['image'];
$temp = $file['tmp_name'];

//set the image upload path
$localPath = 'images/userIcons/uploads/' . uniqid() . '.png';
$path = '../' . $localPath;

//upload image
$image = file_get_contents($temp);
$image = imagecreatefromstring($image);

//set image blending to false, so image will have transparent background
imagealphablending($image, false);

// Set alpha flag
imagesavealpha($image, true);

if ($image) {
    //save image to file
    imagePng($image, $path);
    imagedestroy($image);

    // set response code - 201 created
    http_response_code(201);

    //return the new full image path
    $fullPath = $pathOrigin . $localPath;
    
    echo json_encode(array("imageAddress" => $fullPath));
} else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to upload image"));
}
?>
