<?php
// includes all of the content of connect.php for connecting to the database
include 'connect.php';

//starts a session for a specific user
session_start();

if(!isset($_SESSION['username'])){ //if the user is not logged in for the session
    header('location:index.php');//redirect back to the login page and prevents access if not logged in
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!--Attaches External Style CSS sheet-->
    <link rel="stylesheet" href="style.css">

    <title>Menu Items</title>
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

    <div class="container">
        <h1 style="margin-top:100px;">Menu Items</h1>
   
      <!--Add Item Button-->
      <?php $category_id=$_GET['category_id']; //access id
      echo '<button class="btn btn-primary my-3"> <a href="addItem.php?category_id='.$category_id.'" class="text-light">Add Item</a></button>'; ?>

      <!--Creates Table-->
      <table class="table">
        <thead>
          <tr>
            <!--Creates heading names for each column-->
            <th scope="col">Item Name</th>
            <th scope="col">Price ($)</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $category_id=$_GET['category_id']; //access id

          //sql query to select the items and its information that belong to a certain menu category based on the id related to which edit button was pressed
          $sqlquery="Select * from `items` where category_id=$category_id";
          //runs query and stores whether the query worked
          $result=mysqli_query($connect,$sqlquery);
          if($result){ //if the query works
            while($row=mysqli_fetch_assoc($result)){ //Gets each row in the database until it gets them all
            //assigns variables for each column attribute data in the row from the database
            $id=$row['id'];
            $item_name=$row['item_name']; //passing column name in a row from the database
            $price=$row['price'];
            //displays data in each column in the table on the webpage
            echo '     <tr>
            <td>'.$item_name.'</td>
            <td>'.$price.'</td>
            <td>
                <button class="btn btn-primary"><a href="editItem.php?editid='.$id.'&category_id='.$category_id.'" class="text-light">Edit</a></button>
                <button class="btn btn-danger"><a href="deleteItem.php?deleteid='.$id.'&category_id='.$category_id.'" class="text-light">Delete</a></button>
            </td></tr>'; //displays edit and delete buttons in the last column in the table
            }
          }
          
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>