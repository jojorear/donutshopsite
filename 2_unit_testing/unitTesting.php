<?php
// creates login and invalid variables set to 0 and 1 to be used to check if the user entered the right credentials to log in
$login=0;
$invalid=1;
if($invalid==0) { //Checks if invalid variable is 0
    $login=1; //Log in Success
    echo "$login"
}else{
    $login=0; //Failed to Log in
    echo "$login"
}

 // creates login and invalid variables set to 0 to be used to check if the user entered the right credentials to log in
$login=0;
$invalid=0;
if($invalid==0) { //Checks if invalid variable is 0
    $login=1; //Login Success
    echo "$login"
}else{
    $login=0; //Failed to Log in
    echo "$login"
}

//Checks whether user gets redirected to the homepage correctly if they log in successfully
if($invalid==0) { //Checks if invalid variable is 0
    $login=1; //Log in Success
     header('location:home.php'); //directs to the home page or home.php
}else{
    $login=0; //Failed to Log in
    echo "$login"
}

// creates login and invalid variables set to 0 and 1 to be used to check if the user entered the right credentials to log in
$login=0;
$invalid=1;
//Checks whether user gets redirected to the homepage correctly if they log in successfully
if($invalid==0) { //Checks if invalid variable is 0
    $login=1; //Log in Success
     header('location:home.php'); //directs to the home page or home.php
}else{
    $login=0; //Failed to Log in
    echo "$login"
}

//Test whether an array of data is retrieved correctly
$testArray = array("test1", "test2", "test3");
echo ""Items : " ". $testArray[0] . ", " . $testArray[1] . " and " . $testArray[2] . ".";
?>