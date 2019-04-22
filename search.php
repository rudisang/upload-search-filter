
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Search</title>
</head>
<body>
    <main>
    <div class="container"><h1><a href="index.php">Home</a></h1></div>
        <div class="container">
        <?php if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyfield'){
                echo '<h1 id="tag" onclick="cancel()" style="text-align:center;color:red">Oops! Field empty!</h1>';
            }else if($_GET['error'] == 'norecord'){
                echo '<h1 id="tag" onclick="cancel()" style="text-align:center;color:red">Oops! Record Not Found!</h1>';
            }
          } ?>
            <form method="GET" action="includes/search.inc.php">
                    <input type="search" id="prod_id" name="prod_id" placeholder="Search by product id...">
              <input type="submit" value="Search" name="search">

            </form>
            <?php if(isset($_GET['success'])){
            if($_GET['success'] == 'recordfound'){
                $prod_id = $_GET['prod_id'];
                $prod_type = $_GET['prod_type'];
                $prod_desc = $_GET['prod_desc'];
                $prod_qty = $_GET['prod_qty'];
                $price = $_GET['price'];
                $status = $_GET['status'];
                $country = $_GET['country'];

              echo '<div id="tag" onclick="cancel()">';
              echo '<h1 style="text-align:center;color:green">Record Found!</h1>';
              echo '<p><strong>Product ID:</strong> '.$prod_id.'</p>';
              echo '<p><strong>Product Type:</strong> '.$prod_type.'</p>';
              echo '<p><strong>Description:</strong> '.$prod_desc.'</p>';
              echo '<p><strong>Quantity:</strong> '.$prod_qty.'</p>';
              echo '<p><strong>Price:</strong> '.$price.'</p>';
              echo '<p><strong>Status:</strong> '.$status.'</p>';
              echo '<p><strong>Ships To:</strong> '.$country.'</p>';
              echo '</div>';
            }else{
                echo '<h1 id="tag" onclick="cancel()" style="text-align:center;color:red">Oops! Record Not Found!</h1>';
            }
          } ?>
          </div>
    </main>
    <script>
      function cancel(){
        var tag = document.getElementById('tag');
        tag.style.display = "none";
      }
    </script>
</body>
</html>