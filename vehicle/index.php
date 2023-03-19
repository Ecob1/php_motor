<?php
session_start();
//This is the main controller

// This is the account controller
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/vehicle-model.php';
require_once '../model/uploads-model.php';

// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();

$navList = CreatingNav($classifications); 

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 

switch ($action) {

// Code to deliver the views will be here

case 'addclassification':
// Filter and store the data
  $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));


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
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));        
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
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

/* * ********************************** 
* Get vehicles by classificationId 
* Used for starting Update & Delete process 
* ********************************** */ 
case 'getInventoryItems': 
  // Get the classificationId 
  $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
  // Fetch the vehicles by classificationId from the DB 
  $inventoryArray = getInventoryByClassification($classificationId);
  // Convert the array to a JSON object and send it back 
  echo json_encode($inventoryArray); 
  break;

  // The case for  
case 'mod':
  $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
  $invInfo = getInvItemInfo($invId);
  if(count($invInfo)<1){
    $message = 'Sorry, no vehicle information could be found.';
  }
  include '../view/vehicle-update.php';
  exit;
  break; 

case 'updateVehicle':          
  $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
  $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
  $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);  
  if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)
  ) {
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/vehicle-update.php';
    exit;
  }
  $updateResult = updateVehicle( $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
  
  if ($updateResult) {
    $message = "<p>Congratulations, the $invMake $invModel was successfully updated.</p>";
    // include '../view/vehicle-update.php';
    $_SESSION['message'] = $message;
    echo 'This is not a repetion';
    header('location: /phpmotors/vehicle/');
    exit;
  } else {
    $message = "<p>Error. The new vehicle could not be updated at this time. Please try again later</p>";
    include '../view/vehicle-update.php';
    exit;
  }
  break;

case 'del':
  $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
  $invInfo = getInvItemInfo($invId);
  if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-delete.php';
    exit;
  break;

case 'deleteVehicle':
  $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
  
  $deleteResult = deleteVehicle($invId);
  if ($deleteResult) {
    $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
    $_SESSION['message'] = $message;
    header('location: /phpmotors/vehicle/');
    exit;
  } else {
    $message = "<p class='notice'>Error: $invMake $invModel was not deleted.</p>";
    $_SESSION['message'] = $message;
    header('location: /phpmotors/vehicle/');
    exit;
  }
  break;

case 'view-classification':
  $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $vehicles = getVehiclesByClassification($classificationName);
  if(!count($vehicles)){
    $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
  } else {
    $vehicleDisplay = buildVehiclesDisplay($vehicles);
  }
  include '../view/classification.php';
  break;

  
  case 'view-second-classification':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $vehicles = getInvItemInfo($invId);
    $smThumbnailImage = thumbnailImage($invId);
    $vehicleDisplay = buildingInventoryDisplay($vehicles, $smThumbnailImage);    
    include '../view/vehicle-detail.php';
    break;
  

default:  
  $classificationList = buildClassificationList($classifications);
  include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/vehicle-man.php';
  exit;
break;
}
?>