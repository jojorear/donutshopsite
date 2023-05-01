<?php
// includes all of the content of connect.php for connecting to the database
include 'connect.php';

//starts a session for a specific user
session_start();

if(!isset($_SESSION['username'])){ //if the user is not logged in for the session
    header('location:index.php'); //redirect back to the login page and prevents access if not logged in
}

//when the deleteid is set based on what delete button was pressed
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid']; //getting delete id from url
    
    //sql query to delete the item with a certain id based on which delete button was pressed
    $sqlquery="delete from `items` where id=$id";

    //runs query and stores whether the query worked
    $result=mysqli_query($connect,$sqlquery);
    if($result){ //if query sucessfully happened
        //Deleted Successfully from database
        $category_id=$_GET['category_id']; //access id
        header('location:item.php?category_id='.$category_id.''); //goes back to the item.php or the menu item list page
    }else{ //give an error if query did not work
        die(mysqli_error($connect));
    }
}


?>