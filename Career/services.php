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
include('login.php');

$sql = "SELECT s.`Service_Date` ,s.`Service_ID#`, s.`Customer_ID#`, s.`Service_Type`, s.`Address`, s.`Cost`, CONCAT(c.`FName`, ' ', c.`LName`) AS `Name` , c.`Phone#`, c.`Email` FROM service s JOIN customer c ON s.`Customer_ID#`= c.`Customer_ID#` ORDER BY s.`Service_Date` DESC";

$result = mysqli_query($conn, $sql);

$table = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

//print_r($table);

?>

<!DOCTYPE html>
<html lang="en">
<?php ?>
<h3 class="center red-text">Services</h3>
<div class="container">
    <div class="row">
        <table class="striped centered responsive-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>S-ID</th>
                    <th>C-ID</th>
                    <th>S-Type</th>
                    <th>Address</th>
                    <th>Cost</th>
                    <th>Name</th>
                    <th>Phone#</th>
                    <th>Email</th>
                    <th>More Details</th>

                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($table as $row) {
                ?>
    
                <tr>
                    <?php
                    foreach($row as $column){
                    ?>
                    <td>
                        <?php
                            echo htmlspecialchars($column);
                        ?>
                    </td>
                    <?php } ?>

                    <td> 
                        <a target="_blank" href="C_ID.php?ID=<?php echo htmlspecialchars($row['Customer_ID#']);?>" class="btn-floating btn-small waves-effect waves-light grey darken-2"><i class="material-icons">add</i></a>
                            
                    </td>
                </tr>
                        
                <?php }
                mysqli_close($conn);?>
            </tbody>
            
        </table>



    </div>
</div>
<?php include('../Page layout/footer.php'); ?>

</html>