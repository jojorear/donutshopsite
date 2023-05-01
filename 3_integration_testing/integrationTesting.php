<?php
//Tests the connection between the Login Module and the Store List Module
// creates login and invalid variables set to 0 to be used to check if the user entered the right credentials to log in
$login=0;
$invalid=0;
//Checks whether user gets redirected to the homepage correctly if they log in successfully
if($invalid==0) { //Checks if invalid variable is 0
    $login=1; //Log in Success
     header('location:home.php'); //directs to the home page or home.php (store List page)
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
     header('location:home.php'); //directs to the home page or home.php (store List page)
}else{
    $login=0; //Failed to Log in
    echo "$login"
}

//tests the if user gets redirected if they are not logged in
if( isset( $_SESSION['loggedIn'] ) ) {
   $_SESSION['loggedIn'] = 1;
} else {
   $_SESSION['loggedIn'] = 0;
}

if($_SESSION['username'] == 0 ){ //if the user is not logged in for the session
    header('location:index.php');//redirect back to the login page and prevents access if not logged in
}

//Starting the session
session_start();   
if( isset( $_SESSION['loggedIn'] ) ) {
   $_SESSION['loggedIn'] = 1;
} else {
   $_SESSION['loggedIn'] = 0;
}

if($_SESSION['username'] == 0 ){ //if the user is not logged in for the session
    header('location:index.php');//redirect back to the login page and prevents access if not logged in
}

?>