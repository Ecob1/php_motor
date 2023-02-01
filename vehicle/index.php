<?php
//This is the main controller

// This is the account controller
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/vehicle-model.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();


// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }
 

 switch ($action) {
  // Code to deliver the views will be here
  
  case 'addclassification':
  // Filter and store the data
    $classificationName = filter_input(INPUT_POST, 'classificationName');
  
  // Check for missing data
  if(empty($classificationName)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/add-classification.php';
    exit;
  }
  
  // Send the data to the model
  $regOutcome = classification($classificationName);
  
  // Check and report the result
  if($regOutcome === 1){
    $message = "<p>Thanks for registering $classificationName.</p>";
    include '../view/vehicle-man.php';
    exit;
  } else {
    $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
    include '../view/registration.php';
    exit;
  }
  break;
  case 'classification':
    include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/add-classification.php';
    break;
default:
include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/vehicle/index.php';
}
//  switch ($action){
//     case 'classification':
//         $invMake = filter_input(INPUT_POST, 'invMake');
//         break;
//    default:
//    include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/home.php';
//   }
?>

