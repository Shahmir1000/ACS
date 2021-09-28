
<?php

include('../Page layout/header.php'); 
if(!isset($_SESSION['user'])){
?>
<div class="container center">
    <h3 > This page is only for Employees. <br>
         Please Login to view this page <br><br><br><br>
    </h3>
</div>

<?php
include('../Page layout/footer.php');
exit();
}

include('../Career/login.php');
if(isset($_POST['submit'])){
    $discription = mysqli_real_escape_string($conn, $_POST['discription']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $inventory =  mysqli_real_escape_string($conn, $_POST['inventory']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));

  
    $_SESSION['model'] = $model;


    $query = "INSERT INTO `products` (`Model`, `Brand`, `type`, `Img_name`, `Img_content`, `Img_type`, `Discription`, `Inventory`) VALUES ('$model', '$brand', '$type', '$img_name', '$img_data', '$img_type', '$discription', '$inventory')";
    $result  = $conn->query($query);
    if(!$result) die($conn->error);
    else{
        
        echo'<img src="showimage.php" alt="'.$brand.'">';
    }
}  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <br>
    <br>
  </div>
    <div class="container">
        <h5 class="center"> <strong> Add Products To Product List </strong></h5>
        <br>
        <form class="col s12" action="addProducts.php" id="product" method="POST" name="product" enctype="multipart/form-data">

            <div class="row">

                <div class="input-field col s4">
                    <label for="model"> Model #</label>
                    <input type="text" id="model" name="model">
                </div>

                <div class="input-field col s2">
                    <label for="inventory">Inventory</label>
                    <input type="number" name="inventory" id="inventory">
                </div>
                <div class="input-field col s3">
                    <select name="brand" id="brand" class="browser-default">
                        <option value="" disabled selected>Product Brand</option>
                        <option value="Goodman">Goodman</option>
                        <option value="Carrier">Carrier</option>
                        <option value="Lennox">Lennox</option>
                        <option value="American-Standard">American-Standard</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="input-field col s3">
                    <select name="type" id="type" class="browser-default">
                        <option value="" disabled selected>Product type</option>
                        <option value="AC">AC</option>
                        <option value="Furnace">Furnace</option>
                        <option value="Humidafier">Humidafier</option>
                        <option value="Hot-Water-Tank">Hot Water Tank</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s9">
                    <label for="discription">Discription</label>
                    <textarea class="materialize-textarea" name="discription" id="discription" cols="30" rows="10"></textarea>
                </div>
                <div class="file-field input-field col s3">
                    <div class="btn waves-effect waves-light hoverable black right" >
                        <span>Image</span>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <div class="row center">
                <button class="btn waves-effect waves-light hoverable black" type="submit" form="product" name="submit" id="submit" value="submit">
                    <span>Submit</span>
                    <i class="material-icons right">send</i>
                </button>
                
            </div>
        </form>
    </div>

    <br>
    <br>
    <br>
        
    <?php include('../Page layout/footer.php'); ?>


</body>
</html>
