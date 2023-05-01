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

    <title>Menu Categories</title>
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
        <h1 style="margin-top:100px;">Menu Categories</h1>
   
      <!--Add Store Button-->
      <button class="btn btn-primary my-3"> <a href="addCategory.php" class="text-light">Add Category</a></button>

      <!--Creates Table-->
      <table class="table">
        <thead>
          <tr>
            <!--Creates heading names for each column-->
            <th scope="col">Menu Categories</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //sql query to select all of columns from the store table in the database to get the stores and their information
          $sqlquery="Select * from `categories`";
          //runs query and stores whether the query worked
          $result=mysqli_query($connect,$sqlquery);
          if($result){ //if the query works
            while($row=mysqli_fetch_assoc($result)){ //Gets each row in the database until it gets them all
            //assigns variables for each column attribute data in the row from the database
            $id=$row['id'];
            $category_name=$row['category_name']; //passing column name in a row from the database
            //displays data in each column in the table on the webpage
            echo '     <tr>
            <td>'.$category_name.'</td>
            <td>
                <button class="btn btn-primary"><a href="item.php?category_id='.$id.'" class="text-light">View</a></button>
                <button class="btn btn-primary"><a href="editCategory.php?editid='.$id.'" class="text-light">Edit</a></button>
                <button class="btn btn-danger"><a href="deleteCategory.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            </td></tr>'; //displays edit and delete buttons in the last column in the table
            }
          }
          
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>