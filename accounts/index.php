<?php
//Accounts controller
// Create or access a Session
session_start();
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

$navList = CreatingNav($classifications); 

$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 // Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 }
 switch ($action) {
    // Code to deliver the views will be here
    case 'register':
    // Filter and store the data
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientEmail = checkEmail($clientEmail);
      // Check for email
      $existingEmail = checkExistingEmail($clientEmail);
       // Dealing with email during during registration
       if ($existingEmail){
        $message = '<p class="notice">The email already exists. Do you want to login instead</p>';
        include '../view/login.php';
        exit;
      }
       // Check for missing data
       $checkPassword = checkPassword($clientPassword);
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
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
      } else {
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/registration.php';
        exit;
      }
      break;


      // login and password validation
    case 'login':
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      // $clientEmail = checkEmail($clientEmail);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $passwordCheck = checkPassword($clientPassword);
      // Run basic checks, return if errors
      if (empty($clientEmail) || empty($passwordCheck)) {
      $message = '<p class="notice">Please provide a valid email address and password.</p>';
      include '../view/login.php';
      exit;
      }          
      // A valid password exists, proceed with the login process
      // Query the client data based on the email address
      $clientData = getClient($clientEmail);
      
      // Compare the password just submitted against
      // the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
      // If the hashes don't match create an error
      // and return to the login view
      if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
      }
      // A valid user exists, log them in
      $_SESSION['loggedin'] = TRUE;        
      // Remove the password from the array
      // the array_pop function removes the last
      // element from an array
      array_pop($clientData);
      // Store the array into the session
      $_SESSION['clientData'] = $clientData;
      // Send them to the admin view
      include '../view/admin.php';
      exit;     
      break;

    case 'login-view':  
        include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/login.php';  
        break; 
    case 'register-view':
        include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/registration.php';
        break;
    case 'Logout':
      // We need to empty the ssesion array
      $_SESSION = array();
      // Destroy the session
      session_destroy();
      // Go back to the main page
      header('Location:/phpmotors/');
      break; 
      
      case 'accountUpdate':
        include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/client-update.php';

        break;

      case 'update-user':
        include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/client-update.php';

        break;

      case 'client-update':
        $firstName = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
        $lastName = trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = checkEmail($clientEmail);
        // Check for email
        $existingEmail = checkExistingEmail($clientEmail);
        // Dealing with email during during registration
        if ($existingEmail){
          $message = '<p class="notice">The email already exists. Do you want to login instead</p>';
          include '../view/login.php';
          exit;
        }
        // Check for missing data
        $checkPassword = checkPassword($clientPassword);
        if(empty($firstName) || empty($lastName) || empty($clientEmail) || empty($checkPassword)){
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/admin.php';
          exit;
        }

        $updateResults = updateUser( $firstName, $lastName, $clientEmail, $clientPassword, $invId);
    
        if ($updateResults) {
          $message = "<p>Congratulations, the new information was successfully updated.</p>";
          // include '../view/vehicle-update.php';
          $_SESSION['message'] = $message;
          echo 'This is not a repetion';
          header('location: /phpmotors/accounts/');
          exit;
        } else {
          $message = "<p>Error. The new vehicle could not be updated at this time. Please try again later</p>";
          include '../view/update-user-info.php';
          exit;
        }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);      
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);      
        // Check and report the result
        if($regOutcome === 1){
          setcookie('firstname', $firstname, strtotime('+1 year'), '/');
          $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
          include '../view/login.php';
          exit;
        } else {
          $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/registration.php';
          exit;
        }
        break;

      default:
      $classificationList = buildClassificationList($classifications);
        include '../view/admin.php';
      // include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/home.php';  
}
?>