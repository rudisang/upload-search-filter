<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <main>
    <div class="container"><h1><a href="search.php">Search</a></h1></div>
        <div class="container">
          
          <?php if(isset($_GET['upload'])){
            if($_GET['upload'] == 'success'){
              echo '<h1 id="tag" onclick="cancel()" style="text-align:center;color:green">Upload Successful!</h1>';
            }
          } ?>
            <form method="POST" action="includes/submit.inc.php">
                <fieldset>
                    <legend>Product Description</legend>

                    <label for="prod_id">Product ID</label>
                    <input type="text" id="prod_id" name="prod_id" placeholder="Enter Product ID." required>
                
                    <label for="prod_type">Product Type</label>
                    <input type="text" id="prod_type" name="prod_type" placeholder="Product type.." pattern="[A-Za-z]+">

                    <label for="prod_desc">Product Description</label>
                    <textarea id="prod_desc" name="prod_desc" placeholder="Product description.."></textarea>
                    <p></p>
                    <label for="prod_qty">Quantity</label>
                    <input type="number" id="prod_qty" name="prod_qty" min=-1 pattern="[0-9]">
                </fieldset>

                <fieldset>
                    <legend>Purchase Information</legend>
                    
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" pattern="[0-9]">

                    <label for="status">Status</label>
                    <select id="status" name="status">
                      <option value="in-stock">in-stock</option>
                      <option value="out-of-stock">out-of-stock</option>
                      <option value="ordered">ordered</option>
                    </select>
                
                    <label for="country">Ship To</label>
                    <select id="country" name="country">
                      <option value="australia">Australia</option>
                      <option value="canada">Canada</option>
                      <option value="usa">USA</option>
                      <option value="botswana">Botswana</option>
                      <hr>
                      <option value="south africa">South Africa</option>
                      <option value="ghana">Ghana</option>
                      <option value="germany">Germany</option>
                      <option value="lesotho">Lesotho</option>
                      <hr>
                      <option value="israel">Israel</option>
                      <option value="zimbabwe">Zimbabwe</option>
                    </select>
                </fieldset>

            
              <input type="submit" value="Submit" name="submit">
            </form>
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