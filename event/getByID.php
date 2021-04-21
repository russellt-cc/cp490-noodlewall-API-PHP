<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/event.php';

// instantiate database and event object
$database = new Database();
$db = $database->getConnection();

// initialize object
$event = new Event($db);

// get keywords
$keywords = isset($_GET["id"]) ? $_GET["id"] : "";

// query events
$stmt = $event->eventByEventID($keywords);
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // events array
    $events_arr = array();

    $record; //specifying which object in the array to save new array (of events)
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // extract row
    // this will make $row['name'] to
    // just $name only
    extract($row);
    $record = array(
        "noodleID" => $noodleID,
        "noodleTitle" => $noodleTitle,
        "userID" => $userID,
        "noodleStatus" => $noodleStatus,
        "noodleDescription" => $noodleDescription,
        "noodleSummary" => $noodleSummary,
        "noodleTags" => str_getcsv($noodleTags),
        "noodleCoverImage" => $noodleCoverImage,
        "noodleImages" => str_getcsv($noodleImages),
        "noodleImageText" => str_getcsv($noodleImageText),
        "noodleLocation" => $noodleLocation,
        "noodleDirections" => $noodleDirections,
        "noodleDate" => $noodleDate,
        "noodleTime" => $noodleTime,
        "noodlePrice" => $noodlePrice,
        "noodleMinTickets" => $noodleMinTickets,
        "noodleMaxTickets" => $noodleMaxTickets,
        "noodleTicketsSold" => $noodleTicketsSold,
        "noodleCutoff" => $noodleCutoff
    );


    // set response code - 200 OK
    http_response_code(200);

    // show events data in json format
    echo json_encode($record);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no events found
    echo json_encode(
        array("message" => "No event found.")
    );
}
