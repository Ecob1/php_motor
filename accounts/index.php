<?php
//Accounts controller

// This is the account controller
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();


// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/view/home.php' title='View the PHP Motors home page'>Home</a></li>";
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
    
    case 'register':
    // Filter and store the data
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientEmail = checkEmail($clientEmail);
      
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

      $checkPassword = checkPassword($clientPassword);
    
      // Check for missing data
      if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/registration.php';
        exit;
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
      
      // Send the data to the model
      $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
      
      // Check and report the result
      if($regOutcome === 1){
        $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
      } else {
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/registration.php';
        exit;
      }
      break;
      case 'login-view':    
          include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/login.php';
          break; 
          case 'register-view':
              include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/registration.php';
              break;

          case 'Login':
          
              break;
          default:
          include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/home.php';  
    }

//  switch ($action){
//     case 'login-view':    
//     include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/login.php';
//     break; 
//     case 'register-view':
//         include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/registration.php';
//         break;
//     default:
//     include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/home.php';   
    
//    }
?>