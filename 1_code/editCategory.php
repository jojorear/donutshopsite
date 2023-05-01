<?php
// includes all of the content of connect.php for connecting to the database
include 'connect.php';

//starts a session for a specific user
session_start();

if(!isset($_SESSION['username'])){ //if the user is not logged in for the session
    header('location:index.php');//redirect back to the login page and prevents access if not logged in
}

$id=$_GET['editid']; //access id

//sql query to select the category and its information with a certain id based on which edit button was pressed
$sqlquery="Select * from `categories` where id=$id";

//runs query and stores whether the query worked
$result=mysqli_query($connect,$sqlquery);
$row=mysqli_fetch_assoc($result); //getting the query result category information related to one specific id or category row
$category_name=$row['category_name']; //passing column name from database

//collect form data when the submit button is pressed
if(isset($_POST['submit'])){

    //collects form data and puts them into variables
    $category_name=$_POST['category_name'];

    //sql query to update or edit each attributes or columns in the row in the database
    $sqlquery="update `categories` set id=$id,category_name='$category_name' where id=$id";
    $result=mysqli_query($connect,$sqlquery);
    if($result){ //if query is true
        //Edited successfully
        header('location:category.php'); //goes back to the category.php or the menu category page
    } else{ //give an error if query did not work
        die(mysqli_error($connect));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--Attaches External Style CSS sheet-->
    <link rel="stylesheet" href="style.css">

    <title>Edit Menu Category Information</title>
</head>

<body>
    <!--Navigation bar with a title and links to the store list and log out-->
    <nav>
        <a href="home.php" class="navItem">Store List</a>
        <a href="category.php" class="navItem">Menu</a>
        <h2 class="title">Donut Shop</h2>
        <h5 class="loggedInUser">Welcome
        <?php echo $_SESSION['username'];//display username of the user logged in for the session?>
        </h5>
        <a href="logout.php" class="navItem logout">Logout</a>
    </nav>

    <div class="container my-5">
        <h1 style="margin-top:100px;">Edit Menu Category Information</h1>
        <!--A form with labels and input text boxes to input/edit menu category information-->
        <form method="post">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" autocomplete="off" value="<?php echo $category_name;?>">
            </div>

            <!--Submit edit button-->
            <button type="submit" class="btn btn-primary" name="submit">Submit Edit</button>
        </form>
    </div>



  </body>
</html>