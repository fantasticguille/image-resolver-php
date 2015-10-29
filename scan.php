<?php
ini_set('display_errors', '0');
// Set content-type
header('content-type: application/json; charset=utf-8');


// Get the url
$url = array_key_exists('url', $_REQUEST) 
        ? $_REQUEST['url'] 
        : null;


// Create image finder
include('image_finder.class.php');
$finder = new ImageFinder($url);


// Get images
$images = $finder->get_images();


// Output result
$result = array('images' => $images);
//ob_start('ob_gzhandler');  //http://stackoverflow.com/questions/14039804/error-330-neterr-content-decoding-failed
ob_start();
echo json_encode($result);
