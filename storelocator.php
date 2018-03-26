<?php
require("phpsqlsearch_dbinfo.php");
header("Content-type: text/xml");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
 //Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
 //Opens a connection to a mySQL server
$connection=new mysqli('localhost', $username, $password, 'wemlakhighschool');
if (!$connection) {
  die("Not connected : " . mysql_error());
}
// Set the active mySQL database

// Search the rows in the markers table
$query = sprintf("SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  $center_lat,
  $center_lng,
  $center_lat,
  $radius);


if (!$result = $connection->query($query)) {
    echo $query;
  die("Invalid query: " . $connection->error);
}

// Iterate through the rows, adding XML nodes for each
while ($row = $result->fetch_assoc()){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['id']);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
//    echo ' id '.$row['id'];
//    echo ' name '.$row['name'];
//    echo ' address '.$row['address'];
//    echo ' lat '.$row['lat'];
//    echo ' lng '.$row['lng'];
//    echo ' distance '.$row['distance'];
//    echo "\n";
}
echo $dom->saveXML();
?>