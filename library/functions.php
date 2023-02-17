<?php
function checkEmail($clientEmail){
 $valEmail = trim(filter_var($clientEmail, FILTER_VALIDATE_EMAIL));
 return $valEmail;
}
?>

<?php
// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }
?>

<?php
function checkMake($invMake){
 $valMake = filter_var($invMake, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valMake;
}
?>

<?php
function checkMode($invModel){
 $valModel = filter_var($invModel, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valModel;
}
?>

<?php
function checkDescription($invDescription){
 $valDescription = filter_var($invDescription, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valDescription;
}
?>

<?php
function checkImage($invImage){
 $valImage = filter_var($invImage, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valImage;
}
?>

<?php
function checkThumbnail($invThumbnail){
 $valThumbnail = filter_var($invThumbnail, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valThumbnail;
}
?>

<?php
function checkPrice($invPrice){
 $valPrice = filter_var($invPrice, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valPrice;
}
?>

<?php
function checkStock($invStock){
 $valStock = filter_var($invStock, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valStock;
}
?>

<?php
function checkColor($invColor){
 $valColor = filter_var($invColor, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valColor;
}
?>

<?php
function checkClassificationId($classificationId){
 $valClassificationId = filter_var($classificationId, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valClassificationId;
}
?>

<!--  addclassification validation -->
<?php
function checkClassificationName($classificationName){
 $valclassificationName = filter_var($classificationName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 return $valclassificationName;
}
?>