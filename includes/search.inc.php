<?php

if(isset($_GET['search'])){
require 'db.inc.php';
$peace = "";
$prod_id = $_GET['prod_id'];


if(empty($prod_id)){
    header("Location: ../search.php?error=emptyfield");
    exit();
} else if (!filter_var($prod_id, FILTER_SANITIZE_STRING)){
    header("Location: ../search.php?error=invalidEntry");
    exit();
} else{
    $sql = "SELECT * FROM products WHERE prod_id=?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../search.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $prod_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $prod_id = $row['prod_id'];
            $prod_type = $row['prod_type'];
            $prod_desc = $row['prod_desc'];
            $prod_qty = $row['prod_qty'];
            $price = $row['price'];
            $status = $row['status'];
            $country = $row['country'];
            header("Location: ../search.php?success=recordfound&prod_id=".$prod_id."&prod_type=".$prod_type."&prod_desc=".$prod_desc."&prod_qty=".$prod_qty."&price=".$price."&status=".$status."&country=".$country);
           exit();
        }else{
            header("Location: ../search.php?error=norecord");
            exit();
        }
    }
}

}else{
    header("Location: ../search.php");
    exit();
}