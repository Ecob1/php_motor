<?php
function checkEmail($clientEmail){
 $valEmail = trim(filter_var($clientEmail, FILTER_VALIDATE_EMAIL));
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }

// this is a function for the nav bar.
function CreatingNav($classifications){

    // Build a navigation bar using the $classifications array
    $navList = '<ul  id="navigation-nav">';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/vehicle/index.php?action=view-classification&classificationName="
    .urlencode($classification['classificationName']).
    "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
   }

//This function 
function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
        $dv .= '<li>';
        $dv .= "<a href='/phpmotors/vehicle/?action=view-second-classification&invId="
        .urlencode($vehicle['invId']).
        "' title='View our $vehicle[invId] lineup of vehicles'><img class='car-img' src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
        $dv .= '<hr>';
        $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
        $dv .= "<span>$vehicle[invPrice]</span>";
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
    }

function buildingInventoryDisplay($vehicle){
    // $dv = "<script>console.log(". var_dump($vehicle) .")</script>";
    $dv = "<h2 class='make-model'>$vehicle[invMake] $vehicle[invModel]</h2>";
    $dv .= "<div class='group'>";
    
    $dv .= "<div><img class='car-img' src='".$vehicle['invImage']."' alt='Image of ".$vehicle['invMake']. $vehicle['invModel']." on phpmotors.com'></div>";

    $dv .= "<div id='car-details'>";
    $dv .= "<div class='car-detail'>$vehicle[invMake] $vehicle[invModel] Details </div>";
    $dv .= "<div class='car-detail'>$vehicle[invDescription]</div>";
    $dv .= "<div class='car-detail " . strtolower($vehicle['invColor']) . "'>Color $vehicle[invColor]</div>";
    $dv .= "<div class='car-detail'># in stock: " . $vehicle['invStock'] . "</div>";
    $dv .= "<div class='car-detail'>Price: $$vehicle[invPrice]</div>";
    $dv .= "</div>";

    $dv .= "</div>";
    
    return $dv;
}

?>