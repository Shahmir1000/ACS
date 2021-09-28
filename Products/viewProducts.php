<?php
include('../Page layout/header.php');
//Connecting to database
$conn = mysqli_connect('localhost', 'Shahmir', '!234Qwer' , 'acs');
//checking connection
if(!$conn){
    echo 'Could not connect to server: '. mysqli_connect_error();
}
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM `products` WHERE 1";
$result = mysqli_query($conn,$query);
$products = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(!$result) die($conn->error);

echo '  <div class="row">';
foreach($products as $product){

    $discription = $product['Discription'];
    $inventory= $product['Inventory'];
    $model= $product['Model'];
    $brand= $product['Brand'];
    $img_name = $product['Img_name'];
    $img_content= $product['Img_content'];
    $img_type = $product['Img_type'];


    // echo'<img src="showimage.php?model='.$model.'" alt="'.$brand.'" width = "200">' ;
    // echo'<br><br><br><br><br><br><br><br><br>';
    

    //echo'<image src="data:'.$img_type.';base64,'.base64_encode( $img_content ).'"alt="'.$brand.'" width = "200">';

    //echo '<br>';
?>


<div class="container">

  <padding:5px> 
    <div class="card medium col s12 l4" >

      
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator"  width="200" src=<?php echo  '"data:'.$img_type.';base64,'.base64_encode( $img_content ).'"'?>>
        </div>

      <div class="card-content" data-position="bottom">
        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
        <p><a href="#">This is a link</a></p>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
        <p>Here is some more information about this product that is only revealed once clicked on.</p>
      </div>
    </div>

    </padding:5px>


</div>
    
<!-- <embed src="data <?php $img_type?> ; base64, <?php base64_encode($img_content)?>" width = '200' > -->
    
<?php    

}
?>

</div>

<script>

  document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.materialboxed');
      var instances = M.Materialbox.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
</script>


