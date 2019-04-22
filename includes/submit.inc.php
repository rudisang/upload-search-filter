<?php

if(isset($_POST['submit'])){

require 'db.inc.php';

$prod_id = $_POST['prod_id'];
$prod_type = $_POST['prod_type'];
$prod_desc = $_POST['prod_desc'];
$prod_qty = $_POST['prod_qty'];
$price = $_POST['price'];
$status = $_POST['status'];
$country = $_POST['country'];

if (!filter_var($prod_type, FILTER_SANITIZE_STRING) && !preg_match("/^[A-Za-z]*$/", $prod_type)){
    header("Location: ../index.php?error=invalidEntryProduct");
    exit();
} else if (!filter_var($prod_desc, FILTER_SANITIZE_STRING)){
    header("Location: ../index.php?error=invalidEntry");
    exit();
}  else if (!preg_match("/^[0-9]*$/", $prod_qty)){
    header("Location: ../index.php?error=invalidQuantity&prod_qty=".$prod_qty);
    exit();
}   else if (!preg_match("/^[0-9]*$/", $price)){
    header("Location: ../index.php?error=invalidQuantity&price=".$price);
    exit();
} else{
   
            $sql = "INSERT INTO products (prod_id, prod_type, prod_desc, prod_qty, price, status, country) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "sssiiss",$prod_id, $prod_type, $prod_desc, $prod_qty, $price, $status, $country);
                mysqli_stmt_execute($stmt);
                header("Location: ../index.php?upload=success");
                exit();
            }
        
    
}
mysqli_stmt_close($stmt);
mysqli_close($con);

}else{
    header("Location: ../index.php");
    exit();
}