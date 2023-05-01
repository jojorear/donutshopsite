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

    <title>Store List</title>
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
      <h1 style="margin-top:100px;">List of Stores</h1>

      <form method="post">
        <div class ="row">
          <div class ="col-10">
            <div class ="input-group">
              <div class ="input-group-prepend">
                <span class ="input-group-text bg-dark"><i class="fa-solid fa-magnifying-glass text-light"></i></span>
              </div>
              <input type="text" class ="form-control" placeholder="search by zipcode" name="search" autocomplete="off">
            </div>
          </div>
          <div class ="col-2">
            <!--Search Button-->
            <button type="submit" class="btn btn-primary" name="searchButton"> Search</button>
          </div>
        </div>
      </form>
      
      
      <!--Add Store Button-->
      <button class="btn btn-primary my-3"> <a href="addStore.php" class="text-light">Add Store</a></button>

      <!--Creates Table-->
      <table class="table">
        <thead>
          <tr>
            <!--Creates heading names for each column-->
            <th scope="col">Store Name</th>
            <th scope="col">Street Address</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //collect form data when the submit button is pressed
          if(isset($_POST['searchButton'])){

          //collects form data and puts them into variables
          $search=$_POST['search'];

          if (empty($search)) {
            //sql query to select all of columns from the store table in the database to get the stores and their information
          $sqlquery="Select * from `stores`";
          //runs query and stores whether the query worked
          $result=mysqli_query($connect,$sqlquery);
          if($result){ //if the query works
            while($row=mysqli_fetch_assoc($result)){ //Gets each row in the database until it gets them all
            //assigns variables for each column attribute data in the row from the database
            $id=$row['id'];
            $store_name=$row['store_name']; //passing column name in a row from the database
            $street_address=$row['street_address'];
            $city=$row['city'];
            $state=$row['state'];
            $zip_code=$row['zip_code'];
            $phone_number=$row['phone_number'];
            //displays data in each column in the table on the webpage
            echo '     <tr>
            <td>'.$store_name.'</td>
            <td>'.$street_address.'</td>
            <td>'.$city.'</td>
            <td>'.$state.'</td>
            <td>'.$zip_code.'</td>
            <td>'.$phone_number.'</td>
            <td>
              <button class="btn btn-primary"><a href="editStore.php?editid='.$id.'" class="text-light">Edit</a></button>
              <button class="btn btn-danger"><a href="deleteStore.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            </td></tr>'; //displays edit and delete buttons in the last column in the table
            }
          }
          } else{
          //sql query to select all of columns from the store table in the database to get the stores and their information where the zip code is the same as what the user inputted
          $sqlquery="Select * from `stores` where zip_code=$search";
          //runs query and stores whether the query worked
          $result=mysqli_query($connect,$sqlquery);
          if($result){ //if the query works
            while($row=mysqli_fetch_assoc($result)){ //Gets each row in the database until it gets them all
            //assigns variables for each column attribute data in the row from the database
            $id=$row['id'];
            $store_name=$row['store_name']; //passing column name in a row from the database
            $street_address=$row['street_address'];
            $city=$row['city'];
            $state=$row['state'];
            $zip_code=$row['zip_code'];
            $phone_number=$row['phone_number'];
            //displays data in each column in the table on the webpage
            echo '     <tr>
            <td>'.$store_name.'</td>
            <td>'.$street_address.'</td>
            <td>'.$city.'</td>
            <td>'.$state.'</td>
            <td>'.$zip_code.'</td>
            <td>'.$phone_number.'</td>
            <td>
              <button class="btn btn-primary"><a href="editStore.php?editid='.$id.'" class="text-light">Edit</a></button>
              <button class="btn btn-danger"><a href="deleteStore.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            </td></tr>'; //displays edit and delete buttons in the last column in the table
            }
          }
          }
          } else {
          //sql query to select all of columns from the store table in the database to get the stores and their information
          $sqlquery="Select * from `stores`";
          //runs query and stores whether the query worked
          $result=mysqli_query($connect,$sqlquery);
          if($result){ //if the query works
            while($row=mysqli_fetch_assoc($result)){ //Gets each row in the database until it gets them all
            //assigns variables for each column attribute data in the row from the database
            $id=$row['id'];
            $store_name=$row['store_name']; //passing column name in a row from the database
            $street_address=$row['street_address'];
            $city=$row['city'];
            $state=$row['state'];
            $zip_code=$row['zip_code'];
            $phone_number=$row['phone_number'];
            //displays data in each column in the table on the webpage
            echo '     <tr>
            <td>'.$store_name.'</td>
            <td>'.$street_address.'</td>
            <td>'.$city.'</td>
            <td>'.$state.'</td>
            <td>'.$zip_code.'</td>
            <td>'.$phone_number.'</td>
            <td>
              <button class="btn btn-primary"><a href="editStore.php?editid='.$id.'" class="text-light">Edit</a></button>
              <button class="btn btn-danger"><a href="deleteStore.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            </td></tr>'; //displays edit and delete buttons in the last column in the table
            }
          }
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>