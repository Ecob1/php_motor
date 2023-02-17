<?php
//This is the main controller

// This is the account controller
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/vehicle-model.php';

// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// // This is for the dropdown from navigation bar. 
// $selectList = "<select name='classificationId'>";
// $selectList .= "<option>Choose a classification</option>";
//   foreach($classifications as $classification){
//     $selectList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
//   }
// $selectList .= "</select>";

$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }
 

 switch ($action) {
  // Code to deliver the views will be here
  
  case 'addclassification':
  // Filter and store the data
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationName = checkClassificationName($classificationName);
  
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
    header("Location:/phpmotors/vehicle/");
    exit;
  } else {
    $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
    include '../view/vehicle-man.php';
    exit;
  }
  break;


  case 'classification':
    include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/add-classification.php';
    break;
    case 'add-Vehicle':
      // Filter and store the data
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invMake = checkMake($invMake);

        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = checkMode($invModel);

        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = checkDescription($invDescription);
        
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invImage = checkImage($invImage);

        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = checkThumbnail($invThumbnail);

        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = checkPrice($invPrice);

        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING));
        $invStock = checkStock($invStock);

        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $invColor = checkColor($invColor);

        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
        $classificationId = checkClassificationId($classificationId);

      // Check for missing data
      if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) ||empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/add-vehicle.php';
        exit;
      }
      // Send the data to the model
      $regOutcome = inventory($invMake, $invModel, $invDescription, $invImage, $invThumbnail,
      $invPrice, $invStock, $invColor, $classificationId);
      
      // Check and report the result
      if($regOutcome === 1){
        $message = "<p>Thanks for registering $invModel.</p>";
        header("Location:/phpmotors/vehicle/");
        exit;
      } else {
        $message = "<p>Sorry $invModel, but the registration failed. Please try again.</p>";
        include '../view/add-vehicle.php';
        exit;
      }
      break;
      case 'inventory':
        include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/add-vehicle.php';
        break;
default:
include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/vehicle-man.php';
}
?>