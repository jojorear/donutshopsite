<?php
// includes all of the content of connect.php for connecting to the database
include 'connect.php';

//starts a session for a specific user
session_start();

if(!isset($_SESSION['username'])){ //if the user is not logged in for the session
    header('location:index.php');//redirect back to the login page and prevents access if not logged in
}

//collect form data when the submit button is pressed
if(isset($_POST['submit'])){

    //collects form data and puts them into variables
    $item_name=$_POST['item_name'];
    $price=$_POST['price'];

    $category_id=$_GET['category_id']; //access id

    //sql query to insert a row or record of item information in the database based on what the user inputted
    $sqlquery="insert into `items` (item_name,price,category_id) values('$item_name','$price','$category_id')";
    $result=mysqli_query($connect,$sqlquery);
    if($result){ //if query is true
        //data inserted successfully
        header('location:item.php?category_id='.$category_id.''); //goes back to the item.php or the menu item page
    } else{ //give an error if query did not work
        die(mysqli_error($connect));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--Attaches External Style CSS sheet-->
    <link rel="stylesheet" href="style.css">

    <title>Add Menu Item</title>
</head>

<body>
    <!--Navigation bar with a title and links to the store list, menu, and log out-->
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
        <h1 style="margin-top:100px;">Add Menu Item to List</h1>
        <!--A form with labels and input text boxes to input item information-->
        <form method="post">
            <div class="form-group">
                <label>Item Name</label>
                <input type="text" class="form-control" placeholder="Enter Item Name" name="item_name" autocomplete="off">
            </div>
        
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" placeholder="Enter Price" name="price" autocomplete="off">
            </div>

            <!--Add item button-->
            <button type="submit" class="btn btn-primary" name="submit">Add Item</button>
        </form>
    </div>



  </body>
</html>