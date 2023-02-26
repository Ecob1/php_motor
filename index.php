<?php
session_start();
//This is the main controller

// This is the account controller
// Get the database connection file
require_once './library/connections.php';
// Get the PHP Motors model for use as needed
require_once './model/main-model.php';
// Get the functions library
require_once './library/functions.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();
$navList = CreatingNav($classifications); 


// Build a navigation bar using the $classifications array

$navList .= '</ul>';

$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }
//  elseif ($invMake = filter_input(INPUT_POST, 'invMake');) {
//   # code...
//  }

 switch ($action){
   default:
   include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/view/home.php';
  }
?>