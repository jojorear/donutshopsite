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
  </head>

  <body>
          <?php
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
            //displays data on the webpage
            echo "$store_name $street_address $city $state $zip_code $phone_number"
            }
          }

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
             echo "$id $category_name"
             }
           }

           //sql query to select the items and its information
          $sqlquery="Select * from `items`";
          //runs query and stores whether the query worked
          $result=mysqli_query($connect,$sqlquery);
          if($result){ //if the query works
            while($row=mysqli_fetch_assoc($result)){ //Gets each row in the database until it gets them all
            //assigns variables for each column attribute data in the row from the database
            $id=$row['id'];
            $item_name=$row['item_name']; //passing column name in a row from the database
            $price=$row['price'];
            $category_id=$row['category_id'];
            //displays data in each column in the table on the webpage
            echo "$id $item_name $price $category_id"
            }
          }
          ?>
  </body>
</html>